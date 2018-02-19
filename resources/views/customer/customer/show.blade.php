@extends('layouts.master')
@section('title', 'customer')

@section('header')

    Customer 
    <small>show</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">

                    <a href="{{ url('customer') }}" class="btn btn-default">
                        List
                    </a>

                    <a href="{{ url('customer/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td>Group Name <strong>:</strong></td>
                                <td>{{ $customer->customerGroup->name }}</td>
                            </tr>
                            <tr>
                                <td>Accounts No <strong>:</strong></td>
                                <td>{{ $customer->accounts_no }}</td>
                            </tr>
                            <tr>
                                <td>Name <strong>:</strong></td>
                                <td>{{ $customer->name }}</td>
                            </tr>
                            <tr>
                                <td>Father's Name <strong>:</strong></td>
                                <td>{{ $customer->father }}</td>
                            </tr>
                            <tr>
                                <td>Husband's Name <strong>:</strong></td>
                                <td>{{ $customer->husband }}</td>
                            </tr>
                            <tr>
                                <td>Phone <strong>:</strong></td>
                                <td>{{ $customer->phone }}</td>
                            </tr>
                            <tr>
                                <td>Addres <strong>:</strong></td>
                                <td>{{ $customer->addres }}</td>
                            </tr>
                            <tr>
                                <td>Description <strong>:</strong></td>
                                <td>{{ $customer->description }}</td>
                            </tr>
                            <tr>
                                <td>Status <strong>:</strong></td>
                                <td>
                                    @if ($customer->confirmed == 1)
                                        Active
                                    @else
                                        In Active
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>           
        </div>
    </div>
</div>
@endsection
