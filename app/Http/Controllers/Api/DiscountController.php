<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Discount\DiscountDeleteResource;
use App\Http\Resources\Discount\DiscountIndexResource;
use App\Http\Resources\Discount\DiscountInsertResource;
use App\Http\Resources\Discount\DiscountShowResource;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DiscountIndexResource::collection(Discount::all());
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
            'code_discount' => 'required|min:5|unique:discounts',
            'discount' => 'required|numeric',
            'expires' => 'required|date_format:Y-m-d|after_or_equal:now',
            'active' => 'required|numeric|between:0,1'
        ]);

        $discount = new Discount([
           'code_discount' => $request->get('code_discount'),
           'discount' => $request->get('discount'),
           'expires' => $request->get('expires'),
           'active' => $request->get('active'),
        ]);
        $discount->save();
        return new DiscountInsertResource($discount);
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
            return new DiscountShowResource(Discount::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => '404 not found'
            ], 404);
        }
    }

    public function getDiscount($code){
        $date = today()->format('Y-m-d');
        $discount = Discount::where('code_discount',$code)->where('active','=',1)->where('expires','>=', $date)
            ->first();
        if($discount){
            return new DiscountShowResource($discount);
        } else {
            return response([
                'status' => 'ERROR',
                'error' => 'Discount has Expired'
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
        //
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
            'code_discount' => 'required|min:5',
            'discount' => 'required|numeric',
            'expires' => 'required|date_format:Y-m-d|after_or_equal:now',
            'active' => 'required|numeric|between:0,1'
        ]);

        $discount = Discount::findOrFail($id);
        $discount->code_discount = $request->filled('code_discount') ?  $request->get('code_discount') :
            $discount->code_discount;
        $discount->discount = $request->filled('discount') ?  $request->get('discount') :
            $discount->discount;
        $discount->expires = $request->filled('expires') ?  $request->get('expires') :
            $discount->expires;
        $discount->active = $request->filled('active') ?  $request->get('active') :
            $discount->active;
        $discount->save();
        return new DiscountInsertResource($discount);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();
        return new DiscountDeleteResource($discount);
    }
}
