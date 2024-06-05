<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\CartController;
use App\Http\Controllers\API\V1\CheckoutController;
use App\Http\Controllers\API\V1\HomeController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\TestController;

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


Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::put('edit-user', [AuthController::class, 'edit_user']);
        Route::put('edit-user-password', [AuthController::class, 'edit_user_password']);
        Route::post('add_to_cart', [CartController::class, 'add_to_cart']);
        Route::get('get_cart', [CartController::class, 'get_cart']);
        Route::post('apply_coupon', [CheckoutController::class, 'apply_coupon']);
        Route::post('new_order', [CheckoutController::class, 'new_order']);
        
    });

    Route::post('home', [HomeController::class, 'home']);
    Route::post('single_product', [ProductController::class, 'single_product']);

    Route::post('guest_add_to_cart', [CartController::class, 'guest_add_to_cart']);
    Route::post('guest_get_cart', [CartController::class, 'guest_get_cart']);
    Route::post('remove_from_cart', [CartController::class, 'remove_from_cart']);

    
});
