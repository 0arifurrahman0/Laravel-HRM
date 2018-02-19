<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Customer;
use App\CustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customerGroups = CustomerGroup::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        return view('customer.customer.create', compact('customerGroups'));
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
            'customer_group_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'accounts_no' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'addres' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        Customer::create([
            'customer_group_id'  => $request->customer_group_id,
            'accounts_no'  => $request->accounts_no,
            'name'  => $request->name,
            'father'  => $request->father,
            'husband'  => $request->husband,
            'phone'  => $request->phone,
            'addres'  => $request->addres,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('customer')->with('flash', 'Customer added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return view('customer.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerGroups = CustomerGroup::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $customer = Customer::find($id);

        return view('customer.customer.edit', compact('customer', 'customerGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'customer_group_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'accounts_no' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'addres' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        Customer::find($id)->update([
            'customer_group_id'  => $request->customer_group_id,
            'accounts_no'  => $request->accounts_no,
            'name'  => $request->name,
            'father'  => $request->father,
            'husband'  => $request->husband,
            'phone'  => $request->phone,
            'addres'  => $request->addres,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('customer')->with('flash', 'Customer updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeeDepartment = EmployeeDepartment::find($id);
        $employeeDepartment->delete();
        return redirect('employee/department')->with('flash', 'Department deleted.');
    }
}
