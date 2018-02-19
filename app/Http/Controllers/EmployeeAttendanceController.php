<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Employee;
use App\EmployeeAttendance;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeAttendance = EmployeeAttendance::all();
        return view('hrm.attendance.index', compact('employeeAttendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();
        return view('hrm.attendance.create', compact('employees'));
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
            'employee_id' => 'required',
            'entry' => 'required',
            'type' => 'required',
            'status' => 'required',
        ])->validate();

        EmployeeAttendance::create([
            'employee_id'  => $request->employee_id,
            'entry'  => $request->entry,
            'type'  => $request->type,
            'status'  => $request->status,
            'description' => $request->description,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/attendance')->with('flash', 'Attendance added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeDepartment = EmployeeAttendance::find($id);

        return view('hrm.attendance.edit', compact('employeeDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        EmployeeAttendance::find($id)->update([
            'name'  => $request->name,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/attendance')->with('flash', 'Department updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeDepartment = EmployeeAttendance::find($id);
        $employeeDepartment->delete();
        return redirect('employee/attendance')->with('flash', 'Department deleted.');
    }
}
