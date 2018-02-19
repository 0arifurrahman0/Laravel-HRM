<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeDepartment;
use App\Customer;
use App\CustomerGroup;
use App\CustomerBorrow;
use App\CustomerAccounts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::count();
        $department = EmployeeDepartment::count();
        $customer = Customer::count();
        $group = CustomerGroup::count();
        $loanPay = CustomerBorrow::where('confirmed', 1)->sum('borrow_amount');
        $loanReceive = CustomerAccounts::sum('borrow');
        $customerSavings = CustomerAccounts::sum('savings');
        $savingsWithdraw = CustomerAccounts::sum('withdraw');

        //dd($loanReceive);

        return view('home',compact('employee','department','customer','group','loanPay','loanReceive','customerSavings', 'savingsWithdraw'));
    }
}
