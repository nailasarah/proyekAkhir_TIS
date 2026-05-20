<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class OrderController extends Controller
{
    #[OA\Get(path: '/api/orders', tags: ['Orders'], summary: 'Ambil semua pesanan', security: [['bearerAuth' => []]], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 401, description: 'Tidak terautentikasi')])]
    public function index()
    {
        $orders = Order::with(['user', 'items.product'])->get();
        return response()->json(['status' => 'success', 'message' => 'Data order berhasil diambil', 'data' => $orders], 200);
    }

    #[OA\Post(
        path: '/api/orders',
        tags: ['Orders'],
        summary: 'Buat pesanan baru (semua role)',
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['user_id', 'shipping_address', 'items'],
                properties: [
                    new OA\Property(property: 'user_id', type: 'integer', example: 3),
                    new OA\Property(property: 'shipping_address', type: 'string', example: 'Jl. Pahlawan No.5 Surabaya'),
                    new OA\Property(property: 'notes', type: 'string', example: 'Tolong packing dengan bubble wrap'),
                    new OA\Property(
                        property: 'items',
                        type: 'array',
                        items: new OA\Items(
                            properties: [
                                new OA\Property(property: 'product_id', type: 'integer', example: 1),
                                new OA\Property(property: 'quantity', type: 'integer', example: 2)
                            ]
                        )
                    )
                ]
            )
        ),
        responses: [new OA\Response(response: 201, description: 'Pesanan berhasil dibuat'), new OA\Response(response: 422, description: 'Validasi gagal')]
    )]
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'          => 'required|exists:users,id',
            'shipping_address' => 'required|string',
            'notes'            => 'nullable|string',
            'items'            => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity'   => 'required|integer|min:1',
        ]);

        $data['order_code']  = 'ORD-' . date('Ymd') . '-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT);
        $data['status']      = 'pending';

        $order = \DB::transaction(function () use ($data, $request) {
            $order = Order::create([
                'user_id'          => $data['user_id'],
                'order_code'       => $data['order_code'],
                'status'           => $data['status'],
                'total_price'      => 0,
                'shipping_address' => $data['shipping_address'],
                'notes'            => $data['notes'],
            ]);

            $totalPrice = 0;

            foreach ($request->items as $itemData) {
                $product = \App\Models\Product::findOrFail($itemData['product_id']);
                
                // Deduct stock
                $product->stock = max(0, $product->stock - $itemData['quantity']);
                $product->save();

                $itemPrice = $product->price * $itemData['quantity'];
                $totalPrice += $itemPrice;

                \App\Models\OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'quantity'   => $itemData['quantity'],
                    'price'      => $product->price,
                ]);
            }

            $order->total_price = $totalPrice;
            $order->save();

            return $order;
        });

        return response()->json(['status' => 'success', 'message' => 'Order berhasil dibuat', 'data' => $order->load('user', 'items.product')], 201);
    }

    #[OA\Get(path: '/api/orders/{id}', tags: ['Orders'], summary: 'Ambil pesanan berdasarkan ID', security: [['bearerAuth' => []]], parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)], responses: [new OA\Response(response: 200, description: 'Berhasil'), new OA\Response(response: 404, description: 'Pesanan tidak ditemukan')])]
    public function show($id)
    {
        $order = Order::with(['user', 'items.product'])->find($id);

        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'success', 'message' => 'Data order berhasil diambil', 'data' => $order], 200);
    }

    #[OA\Put(
        path: '/api/orders/{id}/status',
        tags: ['Orders'],
        summary: 'Update status pesanan (Admin & Manager)',
        security: [['bearerAuth' => []]],
        parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['status'],
                properties: [new OA\Property(property: 'status', type: 'string', enum: ['pending', 'processing', 'shipped', 'delivered', 'cancelled'], example: 'processing')]
            )
        ),
        responses: [new OA\Response(response: 200, description: 'Status berhasil diperbarui'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Pesanan tidak ditemukan'), new OA\Response(response: 422, description: 'Status tidak valid')]
    )]
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order tidak ditemukan'], 404);
        }

        $data = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order->update($data);

        return response()->json(['status' => 'success', 'message' => 'Status order berhasil diperbarui', 'data' => $order], 200);
    }

    #[OA\Delete(
        path: '/api/orders/{id}',
        tags: ['Orders'],
        summary: 'Hapus pesanan (Admin)',
        security: [['bearerAuth' => []]],
        parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'), example: 1)],
        responses: [new OA\Response(response: 200, description: 'Pesanan berhasil dihapus'), new OA\Response(response: 403, description: 'Akses ditolak'), new OA\Response(response: 404, description: 'Pesanan tidak ditemukan')]
    )]
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order tidak ditemukan'], 404);
        }

        $order->delete();

        return response()->json(['status' => 'success', 'message' => 'Order berhasil dihapus'], 200);
    }
}
