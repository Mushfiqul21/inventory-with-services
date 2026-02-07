<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(OrderService $orderService)
    {
        $orders = $orderService->getOrders();
        $products = $orderService->getAvailableProducts();

        return view('order', compact('orders', 'products'));
    }

    public function store(Request $request, OrderService $orderService){
        $data = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);

        $orderService->store($data['product_id'], $data['quantity'], $data['price']);

        return redirect()
            ->route('order.index')
            ->with('success', 'Order created successfully');
    }
}
