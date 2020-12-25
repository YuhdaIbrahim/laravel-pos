<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryDeleteResource;
use App\Http\Resources\Category\CategoryIndexResource;
use App\Http\Resources\Category\CategoryInsertResource;
use App\Http\Resources\Category\CategoryShowResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryIndexResource::collection(Category::all());
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
            'name_category' => 'required|max: 50',
        ]);

        $category = new Category(['name_category' => $request->get('name_category')]);
        $category->save();
        return new CategoryInsertResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $category->products()->get();
        if($category){
            return new CategoryShowResource($category);
        } else {
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
        $request->validate([
            'name_category' => 'required|max: 50',
        ]);

        $category = Category::findOrFail($id);
        $category->name_category = $request->filled('name_category') ? $request->get('name_category') : $category->name_category;
        $category->save();
        return new CategoryInsertResource($category);
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
            $category = Category::findOrFail($id);
            $category->products()->delete();
            $category->delete();

            return new CategoryDeleteResource($category);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => '404 not found'
            ], 404);
        }

    }
}
