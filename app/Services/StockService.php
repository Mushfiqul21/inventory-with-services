<?php

namespace App\Services;

use App\Models\Stock;

class StockService
{

    public function add($product_id, $quntity, $price) {
        $stock = Stock::firstOrCreate(
            ['product_id' => $product_id],
            ['buy_quantity' => 0, 'sell_quantity' => 0, 'stock_quantity' => 0, 'stock_value' => 0]
        );

        $stock->buy_quantity += $quntity;
        $stock->stock_quantity += $quntity;
        $stock->stock_value = $stock->stock_quantity * $price;

        $stock->save();
    }

    public function reduce(int $productId, int $qty)
    {
        $stock = Stock::where('product_id', $productId)->firstOrFail();

        if ($stock->stock_quantity < $qty) {
            throw new \Exception('Stock not enough');
        }

        $stock->sell_quantity += $qty;
        $stock->stock_quantity -= $qty;

        $stock->save();
    }
}
