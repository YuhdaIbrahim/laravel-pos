<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Roles\RolesIndexResource;
use App\Http\Resources\Roles\ShowRolesResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RolesIndexResource::collection(Role::all());
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
            'name_role' => 'required:min:6',
        ]);

        $role = new Role([
            'name_role' => $request->get('name_role'),
            'all' => $request->get('all'),
            'home' => $request->get('home'),
            'products' => $request->get('products'),
            'orders' => $request->get('orders'),
            'employees' => $request->get('employees'),
        ]);

        $role->save();
        return new ShowRolesResource($role);
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
            $role = Role::findOrFail($id);
            return new ShowRolesResource($role);
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
            'name_role' => 'required:min:6',
        ]);

        $role = Role::find($id);
        $role->name_role = $request->filled('name_role') ? $request->get('name_role') : $role->name_role;
        $role->all = $request->filled('all') ? $request->get('all') : $role->all;
        $role->home = $request->filled('home') ? $request->get('home') : $role->home;
        $role->products = $request->filled('products') ? $request->get('products') : $role->products;
        $role->orders = $request->filled('orders') ? $request->get('orders') : $role->orders;
        $role->employees = $request->filled('employees') ? $request->get('employees') : $role->employees;

        $role->save();
        return new ShowRolesResource($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return new ShowRolesResource($role);
    }
}
