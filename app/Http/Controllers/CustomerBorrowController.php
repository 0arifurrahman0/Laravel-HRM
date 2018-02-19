<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Customer;
use App\CustomerBorrow;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerBorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerBorrows = CustomerBorrow::all();
        return view('customer.borrow.index', compact('customerBorrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        return view('customer.borrow.create', compact('customers'));
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
            'customer_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'instalment_no' => 'required',
            'instalment_amount' => 'required',
            'borrow_amount' => 'required',
            'date' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        CustomerBorrow::create([
            'customer_id'  => $request->customer_id,
            'instalment_no'  => $request->instalment_no,
            'instalment_amount'  => $request->instalment_amount,
            'borrow_amount'  => $request->borrow_amount,
            'charge'  => $request->charge,
            'total'  => $request->total,
            'date'  => $request->date,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('customer/borrow')->with('flash', 'Borrow added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerBorrow  $customerBorrow
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerBorrow $customerBorrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerBorrow  $customerBorrow
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        $customerBorrow = CustomerBorrow::find($id);

        return view('customer.borrow.edit', compact('customerBorrow','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerBorrow  $customerBorrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'customer_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'instalment_no' => 'required',
            'instalment_amount' => 'required',
            'borrow_amount' => 'required',
            'date' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        CustomerBorrow::find($id)->update([
            'customer_id'  => $request->customer_id,
            'instalment_no'  => $request->instalment_no,
            'instalment_amount'  => $request->instalment_amount,
            'borrow_amount'  => $request->borrow_amount,
            'charge'  => $request->charge,
            'total'  => $request->total,
            'date'  => $request->date,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('customer/borrow')->with('flash', 'Borrow updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerBorrow  $customerBorrow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerBorrow = CustomerBorrow::find($id);
        $customerBorrow->delete();
        return redirect('customer/borrow')->with('flash', 'Borrow deleted.');
    }
}
