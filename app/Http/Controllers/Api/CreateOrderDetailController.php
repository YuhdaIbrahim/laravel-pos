<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderDetailCreateResource;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class CreateOrderDetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
            'id_order' => 'required|exists:orders,id',
            'id_product' => 'required|exists:products,id'
        ]);

        $order_details = new Order_detail([
            'quantity' => $request->get('quantity'),
            'id_order' => $request->get('id_order'),
            'id_product' => $request->get('id_product'),
        ]);

        $order_details->save();
        return new OrderDetailCreateResource($order_details);
    }
}
