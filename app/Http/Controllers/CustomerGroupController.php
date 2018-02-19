<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Branch;
use App\CustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerGroups = CustomerGroup::all();
        return view('customer.group.index', compact('customerGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        return view('customer.group.create', compact('branches'));
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
            'branch_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'name' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        CustomerGroup::create([
            'branch_id'  => $request->branch_id,
            'name'  => $request->name,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('customer/group')->with('flash', 'Group added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerGroup $customerGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerGroup = CustomerGroup::find($id);

        $branches = Branch::select('id', 'name')
                        ->where('confirmed', 1)
                        ->get();

        return view('customer.group.edit', compact('customerGroup', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'branch_id' => [
                'required',
                'integer',
                Rule::notIn(['0', '0']),
            ],
            'name' => 'required',
            'confirmed' => 'boolean'
        ])->validate();

        CustomerGroup::find($id)->update([
            'branch_id'  => $request->branch_id,
            'name'  => $request->name,
            'description' => $request->description,
            'confirmed' => $request->confirmed,
            'update_by'  => Auth::user()->id
        ]);

        return redirect('customer/group')->with('flash', 'Group updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerGroup = CustomerGroup::find($id);
        $customerGroup->delete();
        return redirect('customer/group')->with('flash', 'Group deleted.');
    }
}
