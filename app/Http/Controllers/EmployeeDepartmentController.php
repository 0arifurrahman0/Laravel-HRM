<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\EmployeeDepartment;
use Illuminate\Http\Request;

class EmployeeDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeDepartments = EmployeeDepartment::all();
        return view('hrm.department.index', compact('employeeDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrm.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        EmployeeDepartment::create([
            'name'  => $request->name,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/department')->with('flash', 'Department added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeDepartment  $employeeDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDepartment $employeeDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeDepartment  $employeeDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeDepartment = EmployeeDepartment::find($id);

        return view('hrm.department.edit', compact('employeeDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeDepartment  $employeeDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        EmployeeDepartment::find($id)->update([
            'name'  => $request->name,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/department')->with('flash', 'Department updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeDepartment  $employeeDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeDepartment = EmployeeDepartment::find($id);
        $employeeDepartment->delete();
        return redirect('employee/department')->with('flash', 'Department deleted.');
    }
}
