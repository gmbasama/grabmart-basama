<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GrabController;
use App\Http\Controllers\GetMenuController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::post('/auth/grabID/oauth/token', [GrabController::class, 'oAuth']);
Route::post('/menus/grabID/merchant/menu/notification', [GrabController::class, 'updateMenuNotif']);
Route::put('/menus/grabID/merchant/menu/update', [GrabController::class, 'updateMenuRecord']);
Route::post('/orders/grabID/orders', [GrabController::class, 'submitOrder']);
Route::put('/orders/grabID/order/state', [GrabController::class, 'pushOrder']);
Route::post('menus/sync-webhook', [GrabController::class, 'menuSyncWebhook']);

Route::get('/menus/grabID/merchant/menu', [GetMenuController::class, 'getMenu']);
Route::post('/products/upload', [GetMenuController::class, 'upload']);
Route::get('/products', [GetMenuController::class, 'getCategoryName']);