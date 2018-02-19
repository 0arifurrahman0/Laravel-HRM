@extends('layouts.master')
@section('title', 'attendance')

@section('header')

    Employee 
    <small>Attendance list</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ url('employee/attendance/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th>Name</th>
                            <th>Time</th>
                            <th>Check</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th width="85px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employeeAttendance as $attendance)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->employee->name }}</td>
                                <td>{{ $attendance->entry }}</td>
                                <td>{{ $attendance->type }}</td>
                                <td>{{ $attendance->status }}</td>
                                <td>{{ $attendance->description }}</td>
                                <td>
                                    <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Update">
                                        Edit
                                    </a>

                                    <form action="{{ route('attendance.destroy',$attendance->id) }}"  method="POST" class="pull-right">
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
                                    <a href="{{ url('employee/attendance/create') }}" class="alert-link">new one</a> 
                                    attendance.
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
