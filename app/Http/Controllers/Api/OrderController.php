<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * 🔹 Simpan pesanan baru (checkout)
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:customer_addresses,id',
            'orders' => 'required|array',
        ]);

        $customer = $request->user();

        DB::beginTransaction();
        try {
            foreach ($request->orders as $orderData) {
                $orderCode = 'ORD-' . strtoupper(Str::random(6));

                $order = Order::create([
                    'order_code'        => $orderCode,
                    'customer_id'       => $customer->id,
                    'seller_id'         => $orderData['seller_id'],
                    'address_id'        => $request->address_id,
                    'voucher_id'        => $request->voucher_id ?? null,
                    'subtotal'          => $orderData['subtotal'],
                    'shipping_cost'     => $orderData['shipping_cost'],
                    'discount'          => $orderData['discount'] ?? 0,
                    'grand_total'       => $orderData['grand_total'],
                    'courier_name'      => $orderData['courier_name'],
                    'courier_service'   => $orderData['courier_service'],
                    'shipping_estimate' => $orderData['shipping_estimate'],
                    'status'            => 'pending',
                ]);

                foreach ($orderData['items'] as $item) {
                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity'   => $item['quantity'],
                        'price'      => $item['price'],
                        'total'      => $item['quantity'] * $item['price'],
                    ]);
                }

                if ($request->voucher_id) {
                    $voucher = Voucher::find($request->voucher_id);
                    if ($voucher) {
                        $customer->vouchers()->updateExistingPivot($voucher->id, [
                            'is_used' => true,
                            'redeemed_at' => now(),
                        ]);
                    }
                }
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Order created successfully!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to create order',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * 🔹 GET /api/orders - semua pesanan user
     */
    public function index(Request $request)
    {
        $customer = $request->user();

        $orders = Order::with(['items.product', 'seller'])
            ->where('customer_id', $customer->id)
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'success' => true,
            'orders' => $orders,
        ]);
    }

    /**
     * 🔹 GET /api/orders/{id} - detail pesanan
     */
    public function show($id)
    {
        $order = Order::with(['items.product', 'seller'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'order' => $order,
        ]);
    }

    /**
     * 🔹 POST /api/orders/{id}/review - tambah ulasan
     */
    public function addReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
        ]);

        $order = Order::findOrFail($id);

        if (!empty($order->review)) {
            return response()->json([
                'success' => false,
                'message' => 'Review sudah pernah dikirim untuk pesanan ini.',
            ], 400);
        }

        $order->review = [
            'rating' => $request->rating,
            'comment' => $request->comment,
            'submitted_at' => now(),
        ];
        $order->save();

        return response()->json([
            'success' => true,
            'message' => 'Review berhasil disimpan!',
            'review' => $order->review,
        ]);
    }
}
