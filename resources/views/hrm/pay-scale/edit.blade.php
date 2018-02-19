@extends('layouts.master')
@section('title', 'Employee-salary')

@section('header')

    Employee 
    <small>Salary PayScale update</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="{{ url('employee/pay-scale/create') }}" class="btn btn-default">
                        Create
                    </a>
                    <a href="{{ url('employee/pay-scale') }}" class="btn btn-default">
                        List
                    </a>
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('pay-scale.update', $employeePayScale->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="box-body">
                    <div class="col-md-4">
                        <h4 class="box-title">General Info</h4>
                        <hr>
                        <!--  Name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $employeePayScale->name }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--  Amount -->
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">

                            <label for="amount" class="col-md-4 control-label">Basic Salary</label>

                            <div class="col-md-8">
                                <input id="amount" type="number" min="1" class="form-control" name="amount" value="{{ old('amount') ? old('amount') : $employeePayScale->amount }}" autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-8">

                                <textarea name="description" class="form-control" id="description" cols="30" rows="4" autofocus>{{ old('description') ? old('description') : $employeePayScale->description }}</textarea>

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
                                        @if ($employeePayScale->confirmed == 1)
                                            checked="checked"
                                        @endif
                                    > 
                                    Enable
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="confirmed" value="0" 
                                        @if ($employeePayScale->confirmed == 0)
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

                    <div class="col-md-4">
                        <h4 class="box-title">Earning</h4>
                        <hr>
                        <!-- House Rent -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('house_rent') ? ' has-error' : '' }}">
                                <label for="house_rent" class="col-md-4 control-label">
                                    House Rent
                                </label>

                                <div class="col-md-5">
                                    <input name="house_rent" class="form-control" id="house_rent" type="text" value="{{ $employeePayScale->house_rent ? $employeePayScale->house_rent : '0' }}">

                                    @if ($errors->has('house_rent'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('house_rent') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="house_rent_check" id="house_rent_check" 
                                            @if ( $employeePayScale->house_rent != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Medical -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('medical') ? ' has-error' : '' }}">
                                <label for="medical" class="col-md-4 control-label">
                                    Medical
                                </label>

                                <div class="col-md-5">
                                    <input name="medical" class="form-control" id="medical" type="text" value="{{ $employeePayScale->medical ? $employeePayScale->medical : '0' }}">
                                    
                                    @if ($errors->has('medical'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medical') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="medical_check" id="medical_check" 
                                            @if ( $employeePayScale->medical != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transport -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('transport') ? ' has-error' : '' }}">
                                <label for="transport" class="col-md-4 control-label">
                                    Transport
                                </label>

                                <div class="col-md-5">
                                    <input name="transport" class="form-control" id="transport" type="text" value="{{ $employeePayScale->transport ? $employeePayScale->transport : '0' }}">
                                    
                                    @if ($errors->has('transport'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('transport') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="transport_check" id="transport_check" 
                                            @if ( $employeePayScale->transport != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Phone Bill -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">
                                    Phone Bill
                                </label>

                                <div class="col-md-5">
                                    <input name="phone" class="form-control" id="phone" type="text" value="{{ $employeePayScale->phone ? $employeePayScale->phone : '0' }}">
                                    
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="phone_check" id="phone_check" 
                                            @if ( $employeePayScale->phone != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Conveyance -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('conveyance') ? ' has-error' : '' }}">
                                <label for="conveyance" class="col-md-4 control-label">
                                    Conveyance
                                </label>

                                <div class="col-md-5">
                                    <input name="conveyance" class="form-control" id="conveyance" type="text" value="{{ $employeePayScale->conveyance ? $employeePayScale->conveyance : '0' }}">
                                    
                                    @if ($errors->has('conveyance'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('conveyance') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="conveyance_check" id="conveyance_check" 
                                            @if ( $employeePayScale->conveyance != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Lunch -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('lunch') ? ' has-error' : '' }}">
                                <label for="lunch" class="col-md-4 control-label">
                                    Lunch
                                </label>

                                <div class="col-md-5">
                                    <input name="lunch" class="form-control" id="lunch" type="text" value="{{ $employeePayScale->lunch ? $employeePayScale->lunch : '0' }}">
                                    
                                    @if ($errors->has('lunch'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lunch') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="lunch_check" id="lunch_check" 
                                            @if ( $employeePayScale->lunch != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bonus -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('bonus') ? ' has-error' : '' }}">
                                <label for="bonus" class="col-md-4 control-label">
                                    Bonus
                                </label>

                                <div class="col-md-5">
                                    <input name="bonus" class="form-control" id="bonus" type="text" value="{{ $employeePayScale->bonus ? $employeePayScale->bonus : '0' }}">
                                    
                                    @if ($errors->has('bonus'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bonus') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="bonus_check" id="bonus_check" 
                                            @if ( $employeePayScale->bonus != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Provident Fund -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('company_provident') ? ' has-error' : '' }}">
                                <label for="company_provident" class="col-md-4 control-label">
                                    Provident Fund
                                </label>

                                <div class="col-md-5">
                                    <input name="company_provident" class="form-control" id="company_provident" type="text" value="{{ $employeePayScale->company_provident ? $employeePayScale->company_provident : '0' }}">
                                   
                                    @if ($errors->has('company_provident'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_provident') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="company_provident_check" id="company_provident_check" 
                                            @if ( $employeePayScale->company_provident != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Others -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('earning_other') ? ' has-error' : '' }}">
                                <label for="earning_other" class="col-md-4 control-label">
                                    Others
                                </label>

                                <div class="col-md-5">
                                    <input name="earning_other" class="form-control" id="earning_other" type="text" value="{{ $employeePayScale->earning_other ? $employeePayScale->earning_other : '0' }} ">
                                     
                                    @if ($errors->has('earning_other'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('earning_other') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="earning_other_check" id="earning_other_check" 
                                            @if ( $employeePayScale->earning_other != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h4 class="box-title">Deduction</h4>
                        <hr>
                        <!-- Provident Fund -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('provident') ? ' has-error' : '' }}">
                                <label for="provident" class="col-md-4 control-label">
                                    Provident Fund
                                </label>

                                <div class="col-md-5">
                                    <input name="provident" class="form-control" id="provident" type="text" value="{{ $employeePayScale->provident ? $employeePayScale->provident : '0' }} ">
                                     
                                    @if ($errors->has('provident'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('provident') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="provident_check" id="provident_check" 
                                            @if ( $employeePayScale->provident != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tax -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('tax') ? ' has-error' : '' }}">
                                <label for="tax" class="col-md-4 control-label">
                                    Tax
                                </label>

                                <div class="col-md-5">
                                    <input name="tax" class="form-control" id="tax" type="text" value="{{ $employeePayScale->tax ? $employeePayScale->tax : '0' }} ">
                                     
                                    @if ($errors->has('tax'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tax') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" id="tax_check" name="tax_check" 
                                            @if ( $employeePayScale->tax != '0' )
                                                checked="checked"
                                            @endif 
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Others -->
                        <div class="row">
                            <div class="form-group{{ $errors->has('deduction_other') ? ' has-error' : '' }}">
                                <label for="deduction_other" class="col-md-4 control-label">
                                    Others
                                </label>

                                <div class="col-md-5">
                                    <input name="deduction_other" class="form-control" id="deduction_other" type="text" value="{{ $employeePayScale->deduction_other ? $employeePayScale->deduction_other : '0' }} ">
                                     
                                    @if ($errors->has('deduction_other'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('deduction_other') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="0" name="deduction_other_check" id="deduction_other_check" 
                                            @if ( $employeePayScale->deduction_other != '0' )
                                                checked="checked"
                                            @endif
                                            >
                                            <span class="label label-info">(%)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-12">
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