<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function getOrders($perPage = 10){
        return Order::with('product')->latest()->paginate($perPage);
    }

    public function getAvailableProducts(){
        return Product::whereHas('stock', function ($q) {
            $q->where('stock_quantity', '>', 0);
        })->get();
    }

    public function store($product_id, $qty, $price)
    {
        return DB::transaction(function () use ($product_id, $qty, $price) {
            $product = Product::findOrFail($product_id);
            app(StockService::class)->reduce($product_id, $qty);

            return Order::create( [
                'product_id' => $product_id,
                'price' => $price,
                'quantity' => $qty,
                'total_price' => $qty * $price,
                'status' => 1,
            ]);
        });
    }
}
