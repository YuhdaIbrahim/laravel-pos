<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductDeleteResource;
use App\Http\Resources\Product\ProductIndexResource;
use App\Http\Resources\Product\ProductInsertResource;
use App\Http\Resources\Product\ProductShowResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductIndexResource::collection(Product::with('category')->get());
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
           'name_product' => 'required',
            'price' => 'required|numeric',
            'img_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_category' => 'required',
        ]);

        $profileImage = '';
        if ($files = $request->file('image')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
        }

        $product = new Product([
            'name_product' => $request->get('name_product'),
            'price' => $request->get('price'),
            'img_path' => $profileImage,
            'id_category' => $request->get('id_category'),
        ]);
        $product->save();
        return new ProductInsertResource($product);
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
            return new ProductShowResource(Product::findOrFail($id));
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
        $valid = $request->validate([
            'name_product' => 'required',
            'price' => 'required|numeric',
            'img_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_category' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->name_product = $request->filled('name_product') ? $request->get('name_product') :
            $product->name_product;
        $product->price = $request->filled('price') ? $request->get('price') : $product->price;
        if ($files = $request->file('image')) {
            $destinationPath = 'public/image/'; // upload path
            $product->img_path = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $product->img_path);
        }
        $product->id_category = $request->filled('id_category') ? $request->get('id_category') : $product->id_category;
        $product->save();
        return new ProductInsertResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return new ProductDeleteResource($product);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => '404 not found'
            ], 404);
        }

    }
}
