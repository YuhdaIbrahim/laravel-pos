<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderDetailResource;
use App\Http\Resources\Order\OrderIndexResource;
use App\Models\Order;
use Illuminate\Http\Request;

class GetDetailOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $order = Order::find($id);
        if($order){
            $order->order_details()->get();
            return new OrderDetailResource($order);
        } else {
            return response([
                'status' => 'ERROR',
                'error' => '404 not found'
            ], 404);
        }

    }
}
