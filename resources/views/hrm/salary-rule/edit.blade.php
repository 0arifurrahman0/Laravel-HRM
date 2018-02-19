@extends('layouts.master')
@section('title', 'Employee-salary')

@section('header')

    Employee 
    <small>Salary rule update</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="{{ url('employee/salary-rule/create') }}" class="btn btn-default">
                        Create
                    </a>
                    <a href="{{ url('employee/salary-rule') }}" class="btn btn-default">
                        List
                    </a>
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('salary-rule.update', $employeeSalaryRule->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="box-body">

                    <!-- Name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $employeeSalaryRule->name }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Salary Type -->
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">

                        <label for="name" class="col-md-4 control-label">
                            Salary Type
                        </label>

                        <div class="col-md-8">

                            <label class="radio-inline">
                                <input type="radio" name="type" value="earning" 
                                    @if ($employeeSalaryRule->type === 'earning')
                                        checked="checked"
                                    @endif
                                > 
                                Earning
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="type" value="deduction"
                                    @if ($employeeSalaryRule->type === 'deduction')
                                        checked="checked"
                                    @endif
                                > 
                                Deduction
                            </label>

                            @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Amount Type -->
                    <div class="form-group{{ $errors->has('amount_type') ? ' has-error' : '' }}">

                        <label for="amount_type" class="col-md-4 control-label">
                            Amount Type
                        </label>

                        <div class="col-md-8">

                            <label class="radio-inline">
                                <input type="radio" name="amount_type" value="percent" 
                                    @if ($employeeSalaryRule->amount_type === 'percent')
                                        checked="checked"
                                    @endif
                                > 
                                Percent
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="amount_type" value="fixed"
                                    @if ($employeeSalaryRule->amount_type === 'fixed')
                                        checked="checked"
                                    @endif
                                > 
                                Fixed
                            </label>

                            @if ($errors->has('amount_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('amount_type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!--  Amount -->
                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">

                        <label for="amount" class="col-md-4 control-label">Amount</label>

                        <div class="col-md-8">
                            <input id="amount" type="number" min="1" class="form-control" name="amount" value="{{ $employeeSalaryRule->amount }}" autofocus>

                            @if ($errors->has('amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                        <label for="description" class="col-md-4 control-label">
                            Description
                        </label>

                        <div class="col-md-8">

                            <textarea name="description" class="form-control" id="description" cols="30" rows="4" autofocus>{{ $employeeSalaryRule->description }}</textarea>

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
                                    @if ($employeeSalaryRule->confirmed == 1)
                                        checked="checked"
                                    @endif
                                > 
                                Enable
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="confirmed" value="0"
                                    @if ($employeeSalaryRule->confirmed == 0)
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