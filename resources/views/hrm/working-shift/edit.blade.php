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

            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="{{ url('employee/shift/create') }}" class="btn btn-default">
                        Create
                    </a>
                    <a href="{{ url('employee/shift') }}" class="btn btn-default">
                        List
                    </a>
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('shift.update', $workingShift->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="box-body">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <label for="name" class="col-md-4 control-label">Shift Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $workingShift->name }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('check_in') ? ' has-error' : '' }}">

                        <label for="check_in" class="col-md-4 control-label">
                            Check-IN Before
                        </label>

                        <div class="col-md-8">
                            <input id="check_in" type="text" class="form-control" name="check_in" value="{{ $workingShift->check_in }}" placeholder="09:00 AM" autofocus>
                            <span class="help-block">
                                Time format should be HH:MM (Hour Range 1-12) Ex: 9:00 AM
                            </span>

                            @if ($errors->has('check_in'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('check_in') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('check_out') ? ' has-error' : '' }}">

                        <label for="check_out" class="col-md-4 control-label">
                            Check-Out After
                        </label>

                        <div class="col-md-8">
                            <input id="check_out" type="text" class="form-control" name="check_out" value="{{ $workingShift->check_out }}" placeholder="06:00 PM" autofocus>
                            <span class="help-block">
                                Time format should be HH:MM (Hour Range 1-12) Ex: 6:00 PM
                            </span>

                            @if ($errors->has('check_out'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('check_out') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('working_days') ? ' has-error' : '' }}">
                        <label for="working_days" class="col-md-4 control-label">
                            Working Days
                        </label>
                        <div class="col-md-8">
                            <div class="checkbox">

                                <label>
                                    <input name="working_days[]" type="checkbox" value="Saturday" 
                                        @if ( strpos($workingShift->working_days, 'Saturday' ) !== false)
                                            checked="checked"
                                        @endif
                                    > Saturday
                                </label>
                            
                                <label>
                                    <input name="working_days[]" type="checkbox" value="Sunday" 
                                        @if ( strpos($workingShift->working_days, 'Sunday' ) !== false)
                                            checked="checked"
                                        @endif
                                    > Sunday
                                </label>

                                <label>
                                    <input name="working_days[]" type="checkbox" value="Monday" 
                                        @if ( strpos($workingShift->working_days, 'Monday' ) !== false)
                                            checked="checked"
                                        @endif
                                    > Monday
                                </label>

                                <label>
                                    <input name="working_days[]" type="checkbox" value="Tuesday" 
                                        @if ( strpos($workingShift->working_days, 'Tuesday' ) !== false)
                                            checked="checked"
                                        @endif
                                    > Tuesday
                                </label>

                                <label>
                                    <input name="working_days[]" type="checkbox" value="Wednesday" 
                                        @if ( strpos($workingShift->working_days, 'Wednesday' ) !== false)
                                            checked="checked"
                                        @endif
                                    > Wednesday
                                </label>

                                <label>
                                    <input name="working_days[]" type="checkbox" value="Thursday" 
                                        @if ( strpos($workingShift->working_days, 'Thursday' ) !== false)
                                            checked="checked"
                                        @endif
                                    > Thursday
                                </label>

                                <label>
                                    <input name="working_days[]" type="checkbox" value="Friday" 
                                        @if ( strpos($workingShift->working_days, 'Friday' ) !== false)
                                            checked="checked"
                                        @endif
                                    > Friday
                                </label>

                                @if ($errors->has('working_days'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('working_days') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                        <label for="description" class="col-md-4 control-label">
                            Designation Description
                        </label>

                        <div class="col-md-8">

                            <textarea name="description" class="form-control" id="description" cols="30" rows="4" autofocus>{{ $workingShift->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('confirmed') ? ' has-error' : '' }}">
                        <div class="col-md-8 col-md-offset-4">

                            <label class="radio-inline">
                                <input type="radio" name="confirmed" value="1" 
                                    @if ($workingShift->confirmed == 1)
                                        checked="checked"
                                    @endif
                                > 
                                Enable
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="confirmed" value="0"
                                    @if ($workingShift->confirmed == 0)
                                        checked="checked"
                                    @endif
                                > 
                                Disable
                            </label>

                            @if ($errors->has('confirmed'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('confirmed') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection