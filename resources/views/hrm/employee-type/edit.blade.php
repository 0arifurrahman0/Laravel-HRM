@extends('layouts.master')
@section('title', 'Employee-type')

@section('header')

    Employee 
    <small>Type update</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="{{ url('employee/type/create') }}" class="btn btn-default">
                        Create
                    </a>
                    <a href="{{ url('employee/type') }}" class="btn btn-default">
                        List
                    </a>
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('type.update', $employeeType->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="box-body">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <label for="name" class="col-md-4 control-label">Designation</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $employeeType->name }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                        <label for="description" class="col-md-4 control-label">Designation Description</label>

                        <div class="col-md-8">

                            <textarea name="description" class="form-control" id="description" cols="30" rows="4" autofocus>{{ $employeeType->description }}</textarea>

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
                                    @if ($employeeType->confirmed == 1)
                                        checked="checked"
                                    @endif
                                > 
                                Enable
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="confirmed" value="0"
                                    @if ($employeeType->confirmed == 0)
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