@extends('layouts.master')
@section('title', 'employee')

@section('header')

    Employee 
    <small>list</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ url('employee/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th width="85px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ( $employee->avatar == NULL )
                                        <img src="{{ asset('images/default.png') }}" alt="default avatar"  style="max-width: 40px; height: auto;">
                                    @else
                                        <img src="{{ asset('storage') }}/{{ $employee->avatar }}" alt="default avatar"  style="max-width: 40px; height: auto;">
                                    @endif
                                </td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->employeeDepartment->name }}</td>
                                <td>{{ $employee->employeeDesignation->name }}</td>
                                <td>
                                    @if ( $employee->confirmed == 1)
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
                                    <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Show">
                                        View
                                    </a>

                                    <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Update">
                                        Edit
                                    </a>

                                    <form action="{{ route('employee.destroy',$employee->id) }}"  method="POST" class="pull-right">
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
                                    <a href="{{ url('employee/create') }}" class="alert-link">new one</a> 
                                    employee.
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
