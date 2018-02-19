@extends('layouts.master')
@section('title', 'Working-shift')

@section('header')

    Employee 
    <small>Working shift</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ url('employee/shift/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="15%">Name</th>
                            <th width="10%">Check-IN</th>
                            <th width="13%">Check-Out</th>
                            <th width="22%">Days</th>
                            <th width="15%">Details</th>
                            <th width="10%">Status</th>
                            <th width="85px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($workingShifts as $shift)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $shift->name }}</td>
                                <td>{{ $shift->check_in }}</td>
                                <td>{{ $shift->check_out }}</td>
                                <td>{{ $shift->working_days }}</td>
                                <td>{{ $shift->description }}</td>
                                <td>
                                    @if ( $shift->confirmed == 1)
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
                                    <a href="{{ route('shift.edit', $shift->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Update">
                                        Edit
                                    </a>

                                    <form action="{{ route('shift.destroy',$shift->id) }}"  method="POST" class="pull-right">
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
                                    <a href="{{ url('employee/shift/create') }}" class="alert-link">new one</a> 
                                    working shift.
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
