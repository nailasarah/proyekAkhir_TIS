<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Order;

class CheckOrderStatus
{
    protected array $allowedStatus = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];

    public function handle(Request $request, Closure $next)
    {
        $orderId = $request->route('id');

        if ($orderId) {
            $order = Order::find($orderId);

            if ($order && in_array($order->status, ['cancelled', 'delivered'])) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Order dengan status "' . $order->status . '" tidak dapat dimodifikasi'
                ], 403);
            }
        }

        if ($request->has('status')) {
            $status = $request->input('status');
            if (!in_array($status, $this->allowedStatus)) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Nilai status tidak valid. Pilihan: ' . implode(', ', $this->allowedStatus)
                ], 422);
            }
        }

        return $next($request);
    }
}
