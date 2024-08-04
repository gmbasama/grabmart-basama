<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetMenuController;

Route::get('/', [\App\Http\Controllers\GetMenuController::class, 'index']);
Route::resource('products', \App\Http\Controllers\GetMenuController::class);
Route::post('/products/search',[GetMenuController::class,'search'])->name('products.search');
