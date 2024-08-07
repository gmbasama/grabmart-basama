<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::post('/products/search',[ProductController::class,'search'])->name('products.search');
