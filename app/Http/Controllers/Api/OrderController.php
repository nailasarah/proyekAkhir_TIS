<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return response()->json([
            'status'  => 'success',
            'message' => 'Data order berhasil diambil',
            'data'    => $orders
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'          => 'required|exists:users,id',
            'shipping_address' => 'required|string',
            'notes'            => 'nullable|string',
        ]);

        $data['order_code']  = 'ORD-' . date('Ymd') . '-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT);
        $data['status']      = 'pending';
        $data['total_price'] = 0;

        $order = Order::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Order berhasil dibuat',
            'data'    => $order->load('user')
        ], 201);
    }

    public function show($id)
    {
        $order = Order::with('user')->find($id);

        if (!$order) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Order tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Data order berhasil diambil',
            'data'    => $order
        ], 200);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Order tidak ditemukan'
            ], 404);
        }

        $data = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order->update($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Status order berhasil diperbarui',
            'data'    => $order
        ], 200);
    }
}
