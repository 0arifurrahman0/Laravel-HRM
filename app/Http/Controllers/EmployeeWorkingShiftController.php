<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\EmployeeWorkingShift;
use Illuminate\Http\Request;

class EmployeeWorkingShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workingShifts = EmployeeWorkingShift::all();
        return view('hrm.working-shift.index', compact('workingShifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrm.working-shift.create');
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
            'check_in' => 'required',
            'check_out' => 'required',
            'working_days' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        $days = '';

        foreach ($request->working_days as $day) {
            $days .= $day.', ';
        }

        EmployeeWorkingShift::create([
            'name'  => $request->name,
            'check_in'  => $request->check_in,
            'check_out'  => $request->check_out,
            'working_days'  => $days,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/shift')->with('flash', 'Working shift added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeWorkingShift  $employeeWorkingShift
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeWorkingShift $employeeWorkingShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeWorkingShift  $employeeWorkingShift
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workingShift = EmployeeWorkingShift::find($id);

        return view('hrm.working-shift.edit', compact('workingShift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeWorkingShift  $employeeWorkingShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'working_days' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        $days = '';

        foreach ($request->working_days as $day) {
            $days .= $day.', ';
        }

        EmployeeWorkingShift::find($id)->update([
            'name'  => $request->name,
            'check_in'  => $request->check_in,
            'check_out'  => $request->check_out,
            'working_days'  => $days,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/shift')->with('flash', 'Working shift updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeWorkingShift  $employeeWorkingShift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeDepartment = EmployeeWorkingShift::find($id);
        $employeeDepartment->delete();
        return redirect('employee/shift')->with('flash', 'Working shift deleted.');
    }
}
