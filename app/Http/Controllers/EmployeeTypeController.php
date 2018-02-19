<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\EmployeeType;
use Illuminate\Http\Request;

class EmployeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeTypes = EmployeeType::all();
        return view('hrm.employee-type.index', compact('employeeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrm.employee-type.create');
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

        EmployeeType::create([
            'name'  => $request->name,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/type')->with('flash', 'Employee type added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeType $employeeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeType = EmployeeType::find($id);

        return view('hrm.employee-type.edit', compact('employeeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        EmployeeType::find($id)->update([
            'name'  => $request->name,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/type')->with('flash', 'Employee type updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeType = EmployeeType::find($id);
        $employeeType->delete();
        return redirect('employee/type')->with('flash', 'Employee type deleted.');
    }
}
