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

Route::post('/login','Api\AuthController@login')->name('login');
Route::middleware('auth:api')->post('/logout', 'Api\AuthController@logout')->name('logout');
Route::apiResources([
    'products' => \Api\ProductController::class,
    'categories' => \Api\CategoryController::class,
    'discounts' => \Api\DiscountController::class,
    'orders' => \Api\OrderController::class,
    'employees' => \Api\Dashboard\EmployeeController::class,
]);
Route::post('/create-detail', 'Api\CreateOrderDetailController')->name('create.detail');
Route::get('/get-discount/{code}', 'Api\DiscountController@getDiscount')->name('get.discount');
Route::get('/get-orders-today', 'Api\GetOrderTodayController')->name('order.today');
Route::put('/set-order-status', 'Api\SetStatusOrderController')->name('order.setStatus');
Route::get('/get-detail-order/{id}', 'Api\GetDetailOrderController')->name('order.detail');
Route::get('/get-chart', 'Api\Dashboard\HomeController@getChart')->name('get.chart');
Route::get('/get-top-product', 'Api\Dashboard\HomeController@getTopProduct')->name('get.topProduct');
Route::get('/get-top-categories', 'Api\Dashboard\HomeController@getTopCategories')->name('get.topCategories');
Route::get('/get-orders', 'Api\Dashboard\OrdersController@getOrders')->name('get.orders');
Route::get('/detail-order/{id}', 'Api\Dashboard\OrdersController@getDetailOrder')->name('get.detail-orders');
