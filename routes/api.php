<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GrabController;
use App\Http\Controllers\GetMenu;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/grabID/oauth/token', [GrabController::class, 'oAuth']);
Route::post('/menus/grabID/merchant/menu/notification', [GrabController::class, 'updateMenuNotif']);
Route::post('/orders/grabID/orders', [GrabController::class, 'submitOrder']);
Route::put('/orders/grabID/order/state', [GrabController::class, 'pushOrder']);
Route::post('menus/sync-webhook', [GrabController::class, 'menuSyncWebhook']);

Route::get('/menus/grabID/merchant/menu', [GetMenuController::class, 'getMenu']);
Route::get('/menus', [GetMenuController::class, 'index']);