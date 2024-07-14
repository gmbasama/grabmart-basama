<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GrabController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/grabID/oauth/token', [GrabController::class, 'oAuth']);
Route::post('/menus/grabID/merchant/menu/notification', [GrabController::class, 'updateMenuNotif']);

Route::get('/menus/grabID/merchant/menu', [GrabController::class, 'getMenu']);