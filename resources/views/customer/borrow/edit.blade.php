@extends('layouts.master')
@section('title', 'borrow')

@section('header')

    Customer 
    <small>Borrow update</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="{{ url('customer/borrow/create') }}" class="btn btn-default">
                        Create
                    </a>
                    <a href="{{ url('customer/borrow') }}" class="btn btn-default">
                        List
                    </a>
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('borrow.update',$customerBorrow->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Customer Name -->
                            <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">

                                <label for="customer_id" class="col-md-4 control-label">
                                    Customer Name
                                </label>

                                <div class="col-md-8">
                                    <select id="customer_id" class="form-control" name="customer_id" autofocus>
                                        <option value="0">Select one</option>
                                        @forelse ( $customers as $customer )
                                            <option value="{{ $customer->id }}"
                                                {{ $customerBorrow->customer_id == $customer->id ? 'selected' : '' }}
                                                >
                                                {{ $customer->name }}
                                            </option>
                                        @empty
                                            <option value="0">No customer found</option>
                                        @endforelse
                                        
                                    </select>                                    

                                    @if ($errors->has('customer_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('customer_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Total Installment -->
                            <div class="form-group{{ $errors->has('instalment_no') ? ' has-error' : '' }}">

                                <label for="instalment_no" class="col-md-4 control-label">Total Instalment</label>

                                <div class="col-md-8">
                                    <input id="instalment_no" type="text" class="form-control" name="instalment_no" value="{{ old('instalment_no') ? old('instalment_no') : $customerBorrow->instalment_no }}" autofocus>

                                    @if ($errors->has('instalment_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('instalment_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Installment Amount -->
                            <div class="form-group{{ $errors->has('instalment_amount') ? ' has-error' : '' }}">

                                <label for="instalment_amount" class="col-md-4 control-label">Instalment Amount</label>

                                <div class="col-md-8">
                                    <input id="instalment_amount" type="text" class="form-control" name="instalment_amount" value="{{ old('instalment_amount') ? old('instalment_amount') : $customerBorrow->instalment_amount }}" autofocus>

                                    @if ($errors->has('instalment_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('instalment_amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Borrow Amount -->
                            <div class="form-group{{ $errors->has('borrow_amount') ? ' has-error' : '' }}">

                                <label for="borrow_amount" class="col-md-4 control-label">Borrow Amount</label>

                                <div class="col-md-8">
                                    <input id="borrow_amount" type="text" class="form-control" name="borrow_amount" value="{{ old('borrow_amount') ? old('borrow_amount') : $customerBorrow->borrow_amount }}" autofocus>

                                    @if ($errors->has('borrow_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('borrow_amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Charge -->
                            <div class="form-group{{ $errors->has('charge') ? ' has-error' : '' }}">

                                <label for="charge" class="col-md-4 control-label">Charge</label>

                                <div class="col-md-8">
                                    <input id="charge" type="text" class="form-control" name="charge" value="{{ old('charge') ? old('charge') : $customerBorrow->charge }}" autofocus>

                                    @if ($errors->has('charge'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('charge') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">

                                <label for="total" class="col-md-4 control-label">Total</label>

                                <div class="col-md-8">
                                    <input id="total" type="text" class="form-control" name="total" value="{{ old('total') ? old('total') : $customerBorrow->total }}" autofocus>

                                    @if ($errors->has('total'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('total') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Date -->
                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">

                                <label for="date" class="col-md-4 control-label">Date</label>

                                <div class="col-md-8">
                                    <input id="date" type="date" class="form-control" name="date" value="{{ old('date') ? old('date') : $customerBorrow->date }}" autofocus>

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- description -->
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                                <label for="description" class="col-md-4 control-label">
                                    Description
                                </label>

                                <div class="col-md-8">

                                    <textarea name="description" class="form-control" id="description" cols="30" rows="3" autofocus>{{ old('description') ? old('description') : $customerBorrow->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- status -->
                            <div class="form-group{{ $errors->has('confirmed') ? ' has-error' : '' }}">
                                <label for="employee_pay_scale_id" class="col-md-4 control-label">
                                    Status
                                </label>
                                <div class="col-md-8">
                                    <label class="radio-inline">
                                        <input type="radio" name="confirmed" value="1" 
                                            @if ($customerBorrow->confirmed == 1)
                                                checked="checked"
                                            @endif
                                        > 
                                        Enable
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="confirmed" value="0"
                                        @if ($customerBorrow->confirmed == 0)
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