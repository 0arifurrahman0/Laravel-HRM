<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Customer;
use App\CustomerAccounts;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return view('customer.accounts.create', compact('customers'));
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
            'date' => 'required',
            'savings' => 'required',
        ])->validate();

        CustomerAccounts::create([
            'customer_id'  => $request->customer_id,
            'date' => $request->date,
            'savings' => $request->savings,
            'withdraw' => $request->withdraw,
            'balance' => $request->balance,
            'instalment_no' => $request->instalment_no,
            'instalment' => $request->instalment,
            'borrow' => $request->borrow,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('employee/department')->with('flash', 'Department added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerAccounts  $customerAccounts
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerAccounts $customerAccounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerAccounts  $customerAccounts
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerAccounts $customerAccounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerAccounts  $customerAccounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerAccounts $customerAccounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerAccounts  $customerAccounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerAccounts $customerAccounts)
    {
        //
    }

    public function balance()
    {
        $customers = Customer::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        return view('customer.accounts.balance', compact('customers'));
    }

    public function balanceSheet(Request $request)
    {
        $id = $request->customer_id;
        $balances = CustomerAccounts::all()->where('customer_id', $request->customer_id);
        return view('customer.accounts.sheet', compact('balances','id'));
    }

    public function print($id)
    {
        $id = $id;
        $balances = CustomerAccounts::all()->where('customer_id', $id);
        return view('customer.accounts.print', compact('balances','id'));
    }

    public function calculator()
    {
        return view('customer.accounts.calculator');
    }

    public function calResult(Request $request)
    {
        return view('customer.accounts.cal-result');
    }
}
