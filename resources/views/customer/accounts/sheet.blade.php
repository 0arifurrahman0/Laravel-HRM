@extends('layouts.master')
@section('title', 'sheet')

@section('header')

    Customer 
    <small>balance sheet</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">

            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th>Date</th>
                            <th>Savings</th>
                            <th>Withdraw</th>
                            <th>Balance</th>
                            <th>Instalment No</th>
                            <th>Instalment</th>
                            <th>Loan pay</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($balances as $balance)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $balance->date }}</td>
                                <td>{{ $balance->savings }}</td>
                                <td>{{ $balance->withdraw }}</td>
                                <td>{{ $balance->balance }}</td>
                                <td>{{ $balance->instalment_no }}</td>
                                <td>{{ $balance->instalment }}</td>
                                <td>{{ $balance->borrow }}</td>
                            </tr>

                        @empty

                            <div class="callout callout-info">
                                <h4>Heads up!</h4>
                                <p>
                                    No balance found.
                                </p>
                            </div>

                        @endforelse

                    </tbody>
                </table>
                <a href="{{ url('customer/print/').'/'.$id }}" class="btn btn-success">Print</a>
            </div>
        </div>
    </div>
</div>
@endsection