<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'products' => \Api\ProductController::class,
    'categories' => \Api\CategoryController::class,
    'discounts' => \Api\DiscountController::class,
    'orders' => \Api\OrderController::class,
]);
Route::post('/create-detail', 'Api\CreateOrderDetailController')->name('create.detail');
Route::get('/get-discount/{code}', 'Api\DiscountController@getDiscount')->name('get.discount');
Route::get('/get-orders-today', 'Api\GetOrderTodayController')->name('order.today');
Route::put('/set-order-status', 'Api\SetStatusOrderController')->name('order.setStatus');
Route::get('/get-detail-order/{id}', 'Api\GetDetailOrderController')->name('order.detail');
