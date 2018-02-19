@extends('layouts.master')
@section('title', 'borrow')

@section('header')

    Customer 
    <small>borrow list</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ url('customer/borrow/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th>Branch</th>
                            <th>Group</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Charge</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th width="85px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customerBorrows as $borrow)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $borrow->customer->customerGroup->branch->name }}</td>
                                <td>{{ $borrow->customer->customerGroup->name }}</td>
                                <td>{{ $borrow->customer->name }}</td>
                                <td>{{ $borrow->borrow_amount }}</td>
                                <td>{{ $borrow->charge }}</td>
                                <td>{{ $borrow->borrow_amount + $borrow->charge }}</td>
                                <td>{{ $borrow->date }}</td>
                                <td>
                                    @if ( $borrow->confirmed == 1)
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
                                    <a href="{{ route('borrow.show', $borrow->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="See borrow">
                                        View
                                    </a>

                                    <a href="{{ route('borrow.edit', $borrow->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Update">
                                        Edit
                                    </a>

                                    <form action="{{ route('borrow.destroy',$borrow->id) }}"  method="POST" class="pull-right">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input class="btn btn-xs btn-danger" type="submit" value="Del" data-toggle="tooltip" data-placement="top" title="Delete">
                                    </form>
                                </td>
                            </tr>

                        @empty

                            <div class="callout callout-info">
                                <h4>Heads up!</h4>
                                <p>
                                    Create 
                                    <a href="{{ url('customer/borrow/create') }}" class="alert-link">new one</a> 
                                    borrow.
                                </p>
                            </div>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection