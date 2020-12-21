<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderDeleteResource;
use App\Http\Resources\Order\OrderIndexResource;
use App\Http\Resources\Order\OrderInsertResource;
use App\Http\Resources\Order\OrderShowResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderIndexResource::collection(Order::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required|min:0',
            'id_discount' => 'numeric'
        ]);
        $id_order = 'Orders-00001';
        $cek_order = Order::find($id_order);
        if($cek_order){
            $cek_order = Order::select('id')->orderBy('created_at','desc')->first();
            $id_order = $cek_order->id;
            $id_order++;
        }

        $order = new Order([
            'id' => $id_order,
            'total' => $request->get('total'),
            'id_discount' => $request->get('id_discount'),
        ]);
        $order->save();
        return new OrderInsertResource($order);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new OrderShowResource(Order::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => '404 not found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'total' => 'required|min:0',
            'id_discount' => 'numeric'
        ]);

        $order = Order::findOrFail($id);
        $order->total = $request->filled('total') ? $request->get('total') : $order->total;
        $order->id_discount = $request->filled('id_discount') ? $request->get('id_discount') : $order->id_discount;
        $order->save();
        return new OrderInsertResource($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->order_details()->delete();
        $order->delete();
        return new OrderDeleteResource($order);
    }
}
