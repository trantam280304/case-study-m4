<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\Api\OrderApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ApiController::class,'index']);
Route::get('/products/{id}', [ApiController::class,'show']);


// api cart
Route::get('carts',[CartController::class,'getAllCart']);
Route::post('add_to_cart',[CartController::class,'addToCart']);
Route::put('update_cart',[CartController::class,'update']);
Route::delete('remove_cart/{id}',[CartController::class,'removeToCart']);


Route::post('order', [OrderApiController::class, 'checkout']);

Route::post('login', [AuthApiController::class, 'login']);


Route::post('register', [AuthApiController::class, 'register']);



