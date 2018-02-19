<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\EmployeeSalaryRule;
use Illuminate\Http\Request;

class EmployeeSalaryRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeSalaryRules = EmployeeSalaryRule::all();
        return view('hrm.salary-rule.index', compact('employeeSalaryRules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrm.salary-rule.create');
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
            'type' => 'required',
            'amount_type' => 'required',
            'amount' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        EmployeeSalaryRule::create([
            'name'  => $request->name,
            'type'  => $request->type,
            'amount_type'  => $request->amount_type,
            'amount'  => $request->amount,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/salary-rule')->with('flash', 'Salary rule added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeSalaryRule  $employeeSalaryRule
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeSalaryRule $employeeSalaryRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeSalaryRule  $employeeSalaryRule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeSalaryRule = EmployeeSalaryRule::find($id);

        return view('hrm.salary-rule.edit', compact('employeeSalaryRule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeSalaryRule  $employeeSalaryRule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'amount_type' => 'required',
            'amount' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        EmployeeSalaryRule::find($id)->update([
            'name'  => $request->name,
            'type'  => $request->type,
            'amount_type'  => $request->amount_type,
            'amount'  => $request->amount,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/salary-rule')->with('flash', 'Salary rule updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeSalaryRule  $employeeSalaryRule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeSalaryRule = EmployeeSalaryRule::find($id);
        $employeeSalaryRule->delete();
        return redirect('employee/salary-rule')->with('flash', 'Salary rule deleted.');
    }
}
