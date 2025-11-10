<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
<<<<<<< HEAD
    /**
     * Menampilkan semua item di keranjang milik customer yang sedang login.
     */
    public function index(Request $request)
    {
        // Langsung ambil customer_id dari $request->user() yang dijamin ada oleh middleware
        $customerId = $request->user()->id;

        $items = CartItem::with('product')
            ->where('customer_id', $customerId)
=======
    public function index(Request $request)
    {
        $customer = $request->user(); // ✅ langsung ambil dari Sanctum token
        if (!$customer) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $items = CartItem::with('product')
            ->where('customer_id', $customer->id)
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
            ->get();

        return response()->json($items);
    }

<<<<<<< HEAD
    /**
     * Menambah atau update item di keranjang.
     * Ini sudah benar dari kode kamu sebelumnya.
     */
    public function store(Request $request)
    {
          
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string',
            'variant' => 'nullable|string',
        ]);

        // Langsung gunakan $request->user()->id untuk memastikan customer_id terisi
        $item = CartItem::updateOrCreate(
            [
                'customer_id' => $request->user()->id,
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

    /**
     * Update kuantitas item.
     * 🔒 SUDAH DENGAN PERBAIKAN KEAMANAN
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // 1. Ambil ID customer yang sedang login
        $customerId = $request->user()->id;

        // 2. Cari item berdasarkan ID DAN customer_id
        // Ini memastikan customer A tidak bisa update keranjang customer B
        $item = CartItem::where('id', $id)
                        ->where('customer_id', $customerId)
                        ->firstOrFail(); // Akan error 404 jika item tidak ditemukan/bukan miliknya

        // 3. Update jika ditemukan
        $item->update(['quantity' => $data['quantity']]);

        return response()->json($item->load('product'));
    }

    /**
     * Menghapus item dari keranjang.
     * 🔒 SUDAH DENGAN PERBAIKAN KEAMANAN
     */
    public function destroy(Request $request, $id)
    {
        // 1. Ambil ID customer yang sedang login
        $customerId = $request->user()->id;

        // 2. Cari item berdasarkan ID DAN customer_id
        // Ini memastikan customer A tidak bisa hapus keranjang customer B
        $item = CartItem::where('id', $id)
                        ->where('customer_id', $customerId)
                        ->firstOrFail(); // Akan error 404 jika item tidak ditemukan/bukan miliknya

        // 3. Hapus jika ditemukan
        $item->delete();

        return response()->json(['message' => 'Item removed']);
    }
}
=======
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
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
