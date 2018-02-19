<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\EmployeePayScale;
use App\EmployeeSalaryRule;
use Illuminate\Http\Request;

class EmployeePayScaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeePayScales = EmployeePayScale::all();
        return view('hrm.pay-scale.index', compact('employeePayScales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrm.pay-scale.create');
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
            'amount' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        // House Rent
        if ( $request->house_rent_check == '0' ) {
            $house_rent = $request->house_rent; 
        } else {
            $house_rent = round( (
                ($request->house_rent * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // medical
        if ( $request->medical_check == '0' ) {
            $medical = $request->medical; 
        } else {
            $medical = round( (
                ($request->medical * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // transport
        if ( $request->transport_check == '0' ) {
            $transport = $request->transport; 
        } else {
            $transport = round( (
                ($request->transport * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // phone
        if ( $request->phone_check == '0' ) {
            $phone = $request->phone; 
        } else {
            $phone = round( (
                ($request->phone * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // conveyance
        if ( $request->conveyance_check == '0' ) {
            $conveyance = $request->conveyance; 
        } else {
            $conveyance = round( (
                ($request->conveyance * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // lunch
        if ( $request->lunch_check == '0' ) {
            $lunch = $request->lunch; 
        } else {
            $lunch = round( (
                ($request->lunch * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // bonus
        if ( $request->bonus_check == '0' ) {
            $bonus = $request->bonus; 
        } else {
            $bonus = round( (
                ($request->bonus * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // company_provident
        if ( $request->company_provident_check == '0' ) {
            $company_provident = $request->company_provident; 
        } else {
            $company_provident = round( (
                ($request->company_provident * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // earning_other
        if ( $request->earning_other_check == '0' ) {
            $earning_other = $request->earning_other; 
        } else {
            $earning_other = round( (
                ($request->earning_other * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // provident
        if ( $request->provident_check == '0' ) {
            $provident = $request->provident; 
        } else {
            $provident = round( (
                ($request->provident * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // tax
        if ( $request->house_rent_check == '0' ) {
            $tax = $request->tax; 
        } else {
            $tax = round( (
                ($request->tax * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // deduction_other
        if ( $request->deduction_other_check == '0' ) {
            $deduction_other = $request->deduction_other; 
        } else {
            $deduction_other = round( (
                ($request->deduction_other * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
            );
        }

        EmployeePayScale::create([
            'name'  => $request->name,
            'amount'  => $request->amount,
            'house_rent'  => $house_rent,
            'medical'  => $medical,
            'transport'  => $transport,
            'phone'  => $phone,
            'conveyance'  => $conveyance,
            'lunch'  => $lunch,
            'bonus'  => $bonus,
            'company_provident'  => $company_provident,
            'earning_other'  => $earning_other,
            'provident'  => $provident,
            'tax'  => $tax,
            'deduction_other'  => $deduction_other,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/pay-scale')->with('flash', 'Salary rule added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeePayScale  $employeePayScale
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeePayScale $employeePayScale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeePayScale  $employeePayScale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeePayScale = EmployeePayScale::find($id);

        return view('hrm.pay-scale.edit', compact('employeePayScale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeePayScale  $employeePayScale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

                // House Rent
        if ( $request->house_rent_check == '0' ) {
            $house_rent = $request->house_rent; 
        } else {
            $house_rent = round( (
                ($request->house_rent * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // medical
        if ( $request->medical_check == '0' ) {
            $medical = $request->medical; 
        } else {
            $medical = round( (
                ($request->medical * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // transport
        if ( $request->transport_check == '0' ) {
            $transport = $request->transport; 
        } else {
            $transport = round( (
                ($request->transport * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // phone
        if ( $request->phone_check == '0' ) {
            $phone = $request->phone; 
        } else {
            $phone = round( (
                ($request->phone * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // conveyance
        if ( $request->conveyance_check == '0' ) {
            $conveyance = $request->conveyance; 
        } else {
            $conveyance = round( (
                ($request->conveyance * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // lunch
        if ( $request->lunch_check == '0' ) {
            $lunch = $request->lunch; 
        } else {
            $lunch = round( (
                ($request->lunch * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // bonus
        if ( $request->bonus_check == '0' ) {
            $bonus = $request->bonus; 
        } else {
            $bonus = round( (
                ($request->bonus * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // company_provident
        if ( $request->company_provident_check == '0' ) {
            $company_provident = $request->company_provident; 
        } else {
            $company_provident = round( (
                ($request->company_provident * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // earning_other
        if ( $request->earning_other_check == '0' ) {
            $earning_other = $request->earning_other; 
        } else {
            $earning_other = round( (
                ($request->earning_other * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // provident
        if ( $request->provident_check == '0' ) {
            $provident = $request->provident; 
        } else {
            $provident = round( (
                ($request->provident * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // tax
        if ( $request->house_rent_check == '0' ) {
            $tax = $request->tax; 
        } else {
            $tax = round( (
                ($request->tax * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
             );
        }

        // deduction_other
        if ( $request->deduction_other_check == '0' ) {
            $deduction_other = $request->deduction_other; 
        } else {
            $deduction_other = round( (
                ($request->deduction_other * 100) / $request->amount), 
                3, 
                PHP_ROUND_HALF_DOWN
            );
        }

        EmployeePayScale::find($id)->update([
            'name'  => $request->name,
            'amount'  => $request->amount,
            'house_rent'  => $house_rent,
            'medical'  => $medical,
            'transport'  => $transport,
            'phone'  => $phone,
            'conveyance'  => $conveyance,
            'lunch'  => $lunch,
            'bonus'  => $bonus,
            'company_provident'  => $company_provident,
            'earning_other'  => $earning_other,
            'provident'  => $provident,
            'tax'  => $tax,
            'deduction_other'  => $deduction_other,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/pay-scale')->with('flash', 'Salary rule updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeePayScale  $employeePayScale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeePayScale = EmployeePayScale::find($id);
        $employeePayScale->delete();
        return redirect('employee/pay-scale')->with('flash', 'PayScale deleted.');
    }
}
