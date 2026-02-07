<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
     protected $fillable = [
        'product_id',
        'buy_qty',
        'sell_qty',
        'stock_qty',
        'stock_value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
