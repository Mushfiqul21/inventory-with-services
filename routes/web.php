<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::post('product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('orders', [OrderController::class, 'index'])->name('order.index');

Route::post('order/store', [OrderController::class, 'store'])->name('order.store');
