<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Services\StockService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->orderBy('id', 'desc')->paginate(10);
        return view('index', ['stocks' => $stocks]);
    }
    public function store(Request $request, StockService $stockService)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        // Create product
        $product = new Product();
        $product->name = $request->name;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();

        // Use service to create stock
        $stockService->add($product->id, $product->quantity, $product->price);
        return redirect()->route('index')->with('success', 'Product added!');
    }
}
