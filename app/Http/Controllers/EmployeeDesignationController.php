<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\EmployeeDesignation;
use Illuminate\Http\Request;

class EmployeeDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeDesignations = EmployeeDesignation::all();
        return view('hrm.designation.index', compact('employeeDesignations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrm.designation.create');
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

        EmployeeDesignation::create([
            'name'  => $request->name,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/designation')->with('flash', 'Designation added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeDesignation  $employeeDesignation
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeDesignation $employeeDesignation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeDesignation  $employeeDesignation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeDesignation = EmployeeDesignation::find($id);

        return view('hrm.designation.edit', compact('employeeDesignation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeDesignation  $employeeDesignation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        EmployeeDesignation::find($id)->update([
            'name'  => $request->name,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/designation')->with('flash', 'Designation updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeDesignation  $employeeDesignation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeDesignation = EmployeeDesignation::find($id);
        $employeeDesignation->delete();
        return redirect('employee/designation')->with('flash', 'Designation deleted.');
    }
}
