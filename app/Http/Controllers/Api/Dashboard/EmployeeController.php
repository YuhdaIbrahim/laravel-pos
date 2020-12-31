<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employee\EmployeeIndexResource;
use App\Http\Resources\Employee\EmployeeShowResource;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmployeeIndexResource::collection(Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name' => 'required|max:50',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'id_role' => 'required',
            'jabatan' => 'required|string',
            'gaji' => 'required|numeric',
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'id_role' => $request->get('id_role')
        ]);

        $user->save();

        $employee = new Employee([
            'id_user' => $user->id,
            'jabatan' => $request->get('jabatan'),
            'gaji' => $request->get('gaji'),
        ]);
        $employee->save();
        return new EmployeeShowResource($employee);
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
            return new EmployeeShowResource(Employee::findOrFail($id));
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
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'id_role' => 'required',
            'jabatan' => 'required|string',
            'gaji' => 'required|numeric',
        ]);

        $user = User::findOrfail($id);
        $user->name = $request->filled('name') ? $request->get('name') : $user->name;
        $user->email = $request->filled('email') ? $request->get('email') : $user->email;
        $user->password = $request->filled('password') ? $request->get('password') : $user->password;
        $user->id_role = $request->filled('id_role') ? $request->get('id_role') : $user->id_role;
        $user->save();

        $employee = Employee::findOrFail($id);
        $employee->jabatan = $request->filled('jabatan') ? $request->get('jabatan') : $employee->jabatan;
        $employee->gaji = $request->filled('gaji') ? $request->get('gaji') : $employee->gaji;
        $employee->save();
        return new EmployeeShowResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->employee()->delete;
        $user->delete();
        return new EmployeeShowResource($user);
    }
}
