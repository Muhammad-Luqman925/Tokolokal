<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $customer = $request->user(); // ✅ langsung ambil dari Sanctum token
        if (!$customer) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $items = CartItem::with('product')
            ->where('customer_id', $customer->id)
            ->get();

        return response()->json($items);
    }

    public function store(Request $request)
        {
            $customer = $request->user(); // ✅ Ambil dari Sanctum
            if (!$customer) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $data = $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
                'note' => 'nullable|string',
                'variant' => 'nullable|string',
            ]);

            // ✅ Penting: sertakan customer_id agar tidak null
            $item = CartItem::updateOrCreate(
                [
                    'customer_id' => $customer->id,
                    'product_id' => $data['product_id'],
                ],
                [
                    'quantity' => $data['quantity'],
                    'note' => $data['note'] ?? null,
                    'variant' => $data['variant'] ?? null,
                ]
            );

    return response()->json([
        'message' => 'Produk berhasil ditambahkan ke keranjang',
        'cart_item' => $item->load('product'),
    ]);
}


    public function update(Request $request, $id)
    {
        $item = CartItem::findOrFail($id);
        $item->update(['quantity' => $request->quantity]);
        return response()->json($item->load('product'));
    }

    public function destroy($id)
    {
        CartItem::findOrFail($id)->delete();
        return response()->json(['message' => 'Item removed']);
    }
}
