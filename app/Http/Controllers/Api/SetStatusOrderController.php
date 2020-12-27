<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderShowResource;
use App\Models\Order;
use Illuminate\Http\Request;

class SetStatusOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $id = $request->get('id');
        $order = Order::find($id);
        if($order){
            $order->status = $request->get('status');
            $order->save();
            return new OrderShowResource($order);
        } else {
            return response([
                'status' => 'ERROR',
                'error' => '404 not found'
            ], 404);
        }
    }
}
