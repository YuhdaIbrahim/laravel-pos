<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ShowOrderDetails;
use App\Http\Resources\Order\OrderDetailResource;
use App\Http\Resources\Order\OrderIndexResource;
use App\Http\Resources\Order\OrderShowResource;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getOrders(){
        return OrderIndexResource::collection(Order::all());
    }

    public function getDetailOrder($id){
        try {
            $order = Order::find($id);
            $order->with(['order_details','product_details'])->get();
            return new ShowOrderDetails($order);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => '404 not found'
            ], 404);
        }
    }
}
