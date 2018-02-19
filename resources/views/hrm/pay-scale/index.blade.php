@extends('layouts.master')
@section('title', 'PayScale')

@section('header')

    Employee 
    <small>Salary payScale</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ url('employee/pay-scale/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Basic</th>
                            <th>House&nbsp;Rent</th>
                            <th>Medical</th>
                            <th>Transport</th>
                            <th>Phone</th>
                            <th>Conveyance</th>
                            <th>Lunch</th>
                            <th>Bonus</th>
                            <th>Provident&nbsp;Fund</th>
                            <th>Others</th>
                            <th>Total&nbsp;Earnings</th>
                            <th>Provident&nbsp;Fund</th>
                            <th>Others</th>
                            <th>Gross&nbsp;Total</th>
                            <th>Tax</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th width="85px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $employeePayScales as $scale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $scale->name }}</td>
                                <td>{{ $scale->amount }}</td>
                                <td>
                                    {{ ($scale->house_rent * $scale->amount) / 100 }}
                                    ({{ $scale->house_rent }}%)
                                </td>
                                <td>
                                    {{ ($scale->medical * $scale->amount) / 100 }}
                                    ({{ $scale->medical }}%)
                                </td>
                                <td>
                                    {{ ($scale->transport * $scale->amount) / 100 }}
                                    ({{ $scale->transport }}%)
                                </td>
                                <td>
                                    {{ ($scale->phone * $scale->amount) / 100 }}
                                    ({{ $scale->phone }}%)
                                </td>
                                <td>
                                    {{ ($scale->conveyance * $scale->amount) / 100 }}
                                    ({{ $scale->conveyance }}%)
                                </td>
                                <td>
                                    {{ ($scale->lunch * $scale->amount) / 100 }}
                                    ({{ $scale->lunch }}%)
                                </td>
                                <td>
                                    {{ ($scale->bonus * $scale->amount) / 100 }}
                                    ({{ $scale->bonus }}%)
                                </td>
                                <td>
                                    {{ ($scale->company_provident * $scale->amount) / 100 }}
                                    ({{ $scale->company_provident }}%)
                                </td>
                                <td>
                                    {{ ($scale->earning_other * $scale->amount) / 100 }}
                                    ({{ $scale->earning_other }}%)
                                </td>

                                <td>
                                   @php
                                      $totalEarning =  (((( $scale->house_rent + $scale->medical + $scale->transport + $scale->phone + $scale->conveyance + $scale->lunch + $scale->bonus + $scale->company_provident + $scale->earning_other ) * $scale->amount) / 100 ) + $scale->amount);
                                      echo $totalEarning;
                                    @endphp
                                </td>

                                <td class="text-danger">
                                    {{ ($scale->provident * $scale->amount) / 100 }}
                                    ({{ $scale->provident }}%)
                                </td>
                                <td class="text-danger">
                                    {{ ($scale->deduction_other * $scale->amount) / 100 }}
                                    ({{ $scale->deduction_other }}%)
                                </td>

                                <td>
                                    @php
                                        $grossTotal = $totalEarning - ((($scale->provident + $scale->deduction_other) * $scale->amount) / 100);
                                        echo $grossTotal;
                                    @endphp
                                </td>
                                <td class="text-danger">
                                    @php

                                    @endphp
                                    {{ ($scale->tax * $scale->amount) / 100 }}
                                    ({{ $scale->tax }}%)
                                </td>

                                <td class="text-info" style="font-weight:bold;">
                                    @php
                                        echo ($grossTotal - (($scale->tax * $scale->amount) / 100));
                                    @endphp
                                </td>

                                <td>
                                    @if ( $scale->confirmed == 1)
                                        <span class="label label-success">
                                            Approved
                                        </span>
                                    @else
                                        <span class="label label-warning">
                                            Pending
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pay-scale.edit', $scale->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Update">
                                        Edit
                                    </a>

                                    <form action="{{ route('pay-scale.destroy',$scale->id) }}"  method="POST" class="pull-right">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input class="btn btn-xs btn-danger" type="submit" value="Del" data-toggle="tooltip" data-placement="top" title="Delete">
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
