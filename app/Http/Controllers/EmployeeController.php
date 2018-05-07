<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Validator;
use App\Employee;
use App\EmployeeType;
use App\EmployeeDepartment;
use App\EmployeeDesignation;
use App\EmployeeWorkingShift;
use App\EmployeePayScale;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('hrm.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeType = EmployeeType::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $employeeDepartment = EmployeeDepartment::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $employeeDesignation = EmployeeDesignation::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $workingShift = EmployeeWorkingShift::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $employeePayScale = EmployeePayScale::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        return view('hrm.employee.create', compact('employeeType', 'employeeDepartment', 'employeeDesignation', 'workingShift', 'employeePayScale'));
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
            'employee_type_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'employee_department_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'employee_designation_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'employee_working_shift_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'employee_pay_scale_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'name' => 'required|string',
            'father_name' => 'required|string|max:100',
            'mother_name' => 'required|string|max:100',
            'phone' => 'required|max:20',
            'email' => 'required|email|unique:employees|max:50',
            'birthday' => 'required|date',
            'gender' => 'required',
            'marital_status' => 'required',
            'present_addres' => 'required',
            'permanent_addres' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png|max:300',
            'cv' => 'mimes:doc,pdf,docx|max:200',
            'signature' => 'mimes:jpeg,jpg,png|max:100',
            'join' => 'required',
            'education' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        if ( $request->hasFile('avatar') ) {
            if ( $request->file('avatar')->isValid() ) {
                $id = Auth::user()->id;
                $avatarName = $request->file('avatar');
                $avatar = $id.'.'.time().'.'.$avatarName->extension();
                Image::make($avatar)->resize(300,300)->save(public_path('/images/employee/avatar/'.$avatar));
                // $avatar = $request->file('avatar')->store(
                //     'employee/avatars', 'public'
                // );
            }
        } else {
            $avatar = NUll;
        }

        if ( $request->hasFile('cv') ) {
            if ( $request->file('cv')->isValid() ) {
                $cv = $request->file('cv')->store(
                    'employee/cv', 'public'
                );
            }
        } else {
            $cv = NUll;
        }

        if ( $request->hasFile('signature') ) {
            if ( $request->file('signature')->isValid() ) {
                $signature = $request->file('signature')->store(
                    'employee/signature', 'public'
                );
            }
        } else {
            $signature = NUll;
        }

        Employee::create([
            'employee_type_id'  => $request->employee_type_id,
            'employee_department_id'  => $request->employee_department_id,
            'employee_designation_id'  => $request->employee_designation_id,
            'employee_working_shift_id'  => $request->employee_working_shift_id,
            'employee_pay_scale_id'  => $request->employee_pay_scale_id,
            'name'  => $request->name,
            'father_name'  => $request->father_name,
            'mother_name'  => $request->mother_name,
            'phone'  => $request->phone,
            'email'  => $request->email,
            'birthday'  => $request->birthday,
            'gender'  => $request->gender,
            'marital_status'  => $request->marital_status,
            'nid'  => $request->nid,
            'blood_group'  => $request->blood_group,
            'present_addres'  => $request->present_addres,
            'permanent_addres'  => $request->permanent_addres,
            'avatar'  => $avatar,
            'signature'  => $signature,
            'cv'  => $cv,
            'join'  => $request->join,
            'education'  => $request->education,
            'remark'  => $request->remark,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee')->with('flash', 'Employee added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('hrm.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeType = EmployeeType::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $employeeDepartment = EmployeeDepartment::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $employeeDesignation = EmployeeDesignation::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $workingShift = EmployeeWorkingShift::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $employeePayScale = EmployeePayScale::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $employee = Employee::find($id);

        return view('hrm.employee.edit', compact('employee', 'employeeType', 'employeeDepartment', 'employeeDesignation', '', 'workingShift', 'employeePayScale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'employee_type_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'employee_department_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'employee_designation_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'employee_working_shift_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'employee_pay_scale_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'name' => 'required|string',
            'father_name' => 'required|string|max:100',
            'mother_name' => 'required|string|max:100',
            'phone' => 'required|max:20',
            'email' => 'required|email|max:50',
            'birthday' => 'required|date',
            'gender' => 'required',
            'marital_status' => 'required',
            'present_addres' => 'required',
            'permanent_addres' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png|max:300',
            'cv' => 'mimes:doc,pdf,docx|max:200',
            'signature' => 'mimes:jpeg,jpg,png|max:100',
            'join' => 'required',
            'education' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        $employee = Employee::find($id);

        if ( $request->hasFile('avatar') ) {
            if ( $request->file('avatar')->isValid() ) {
                $avatar = $request->file('avatar')->store(
                    'employee/avatars', 'public'
                );
            }
        } else {
            $avatar = $employee->avatar;
        }

        if ( $request->hasFile('cv') ) {
            if ( $request->file('cv')->isValid() ) {
                $cv = $request->file('cv')->store(
                    'employee/cv', 'public'
                );
            }
        } else {
            $cv = $employee->cv;
        }

        if ( $request->hasFile('signature') ) {
            if ( $request->file('signature')->isValid() ) {
                $signature = $request->file('signature')->store(
                    'employee/signature', 'public'
                );
            }
        } else {
            $signature = $employee->signature;
        }

        Employee::find($id)->update([
            'employee_type_id'  => $request->employee_type_id,
            'employee_department_id'  => $request->employee_department_id,
            'employee_designation_id'  => $request->employee_designation_id,
            'employee_working_shift_id'  => $request->employee_working_shift_id,
            'employee_pay_scale_id'  => $request->employee_pay_scale_id,
            'name'  => $request->name,
            'father_name'  => $request->father_name,
            'mother_name'  => $request->mother_name,
            'phone'  => $request->phone,
            'email'  => $request->email,
            'birthday'  => $request->birthday,
            'gender'  => $request->gender,
            'marital_status'  => $request->marital_status,
            'nid'  => $request->nid,
            'blood_group'  => $request->blood_group,
            'present_addres'  => $request->present_addres,
            'permanent_addres'  => $request->permanent_addres,
            'avatar'  => $avatar,
            'signature'  => $signature,
            'cv'  => $cv,
            'join'  => $request->join,
            'education'  => $request->education,
            'remark'  => $request->remark,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee')->with('flash', 'Employee updated.');
        // Validator::make($request->all(), [
        //     'name' => 'required',
        //     'confirmed' => 'boolean'
        // ])->validate();

        // EmployeeDepartment::find($id)->update([
        //     'name'  => $request->name,
        //     'description' => $request->description,
        //     'confirmed' => $request->confirmed,
        //     'update_by'  => Auth::user()->id
        // ]);

        // return redirect('employee/department')->with('flash', 'Department updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeDepartment = Employee::find($id);
        $employeeDepartment->delete();
        return redirect('employee/department')->with('flash', 'Department deleted.');
    }
}
