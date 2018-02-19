@extends('layouts.master')
@section('title', 'attendance')

@section('header')

    Employee 
    <small>Attendance</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">

                    <a href="{{ url('employee/attendance') }}" class="btn btn-default">
                        List
                    </a>
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('attendance.store') }}">
                {{ csrf_field() }}

                <div class="box-body">

                    <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">

                        <label for="employee_id" class="col-md-4 control-label">
                            Employee Name
                        </label>

                        <div class="col-md-8">
                            <select id="employee_id" class="form-control" name="employee_id" autofocus>
                                <option value="0">Select one</option>
                                @forelse ( $employees as $employee )
                                    <option 
                                        value="{{ $employee->id }}" 
                                        {{ old('employee_id') ? 'selected' : '' }} 
                                    >
                                        {{ $employee->name }}
                                    </option>
                                @empty
                                    <option value="0">No employee found</option>
                                @endforelse
                                
                            </select> 

                            @if ($errors->has('employee_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('employee_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Entry time -->
                    <div class="form-group{{ $errors->has('entry') ? ' has-error' : '' }}">

                        <label for="entry" class="col-md-4 control-label">Time</label>

                        <div class="col-md-8">
                            <input id="entry" type="text" class="form-control" name="entry" value="@php echo date('Y-m-d H:i:s'); @endphp" 
                            autofocus>

                            @if ($errors->has('entry'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entry') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Check IN or OUT -->
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">

                        <label for="type" class="col-md-4 control-label">
                            Check
                        </label>

                        <div class="col-md-8">
                            <select id="type" class="form-control" name="type" autofocus>
                                <option value="in">Check-IN</option>
                                <option value="out">Check-OUT</option>
                            </select>                                    

                            @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">

                        <label for="status" class="col-md-4 control-label">
                            Status
                        </label>

                        <div class="col-md-8">
                            <select id="status" class="form-control" name="status" autofocus>
                                <option value="perpect">Perpect</option>
                                <option value="good">Good</option>
                                <option value="late">Late</option>
                            </select>                                    

                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-8">

                            <textarea name="description" class="form-control" id="description" cols="30" rows="4" autofocus>{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
