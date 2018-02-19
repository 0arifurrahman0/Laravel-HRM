@extends('layouts.master')
@section('title', 'customer')

@section('header')

    Customer 
    <small>list</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ url('customer/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th>Group</th>
                            <th>Accounts</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Addres</th>
                            <th>Status</th>
                            <th width="85px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->customerGroup->name }}</td>
                                <td>{{ $customer->accounts_no }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->addres }}</td>
                                <td>
                                    @if ( $customer->confirmed == 1)
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
                                    <a href="{{ route('customer.show', $customer->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="See customer">
                                        View
                                    </a>

                                    <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Update">
                                        Edit
                                    </a>

                                    <form action="{{ route('customer.destroy',$customer->id) }}"  method="POST" class="pull-right">
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
                                    <a href="{{ url('customer/create') }}" class="alert-link">new one</a> 
                                    customer.
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