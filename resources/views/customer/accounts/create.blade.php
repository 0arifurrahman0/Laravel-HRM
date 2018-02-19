@extends('layouts.master')
@section('title', 'pay')

@section('header')

    Customer 
    <small>pay</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <!-- <div class="btn-group">

                    <a href="{{ url('customer/borrow') }}" class="btn btn-default">
                        List
                    </a>
                </div> -->
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('accounts.store') }}">
                {{ csrf_field() }}

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Customer Name -->
                            <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">

                                <label for="customer_id" class="col-md-4 control-label">
                                    Customer Name
                                </label>

                                <div class="col-md-8">
                                    <select id="customer_id" class="form-control" name="customer_id" autofocus>
                                        <option value="0">Select one</option>
                                        @forelse ( $customers as $customer )
                                            <option 
                                                value="{{ $customer->id }}" 
                                                {{ old('customer_id') ? 'selected' : '' }} 
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
                        </div>
                        <div class="col-md-6">
                            <!-- Date -->
                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">

                                <label for="date" class="col-md-4 control-label">Date</label>

                                <div class="col-md-8">
                                    <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" autofocus>

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 col-sm-4">
                            <!-- Savings -->
                            <div class="form-group{{ $errors->has('savings') ? ' has-error' : '' }}">

                                <label for="savings" class="col-md-12">Savings</label>

                                <div class="col-md-12">
                                    <input id="savings" type="text" class="form-control" name="savings" value="{{ old('savings') }}" autofocus>

                                    @if ($errors->has('savings'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('savings') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <!-- Withdraw -->
                            <div class="form-group{{ $errors->has('withdraw') ? ' has-error' : '' }}">

                                <label for="withdraw" class="col-md-12">Withdraw</label>

                                <div class="col-md-12">
                                    <input id="withdraw" type="text" class="form-control" name="withdraw" value="{{ old('withdraw') }}" autofocus>

                                    @if ($errors->has('withdraw'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('withdraw') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <!-- Balance -->
                            <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">

                                <label for="balance" class="col-md-12">Balance</label>

                                <div class="col-md-12">
                                    <input id="balance" type="text" class="form-control" name="balance" value="{{ old('balance') }}" autofocus>

                                    @if ($errors->has('balance'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('balance') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <!-- Instalment No -->
                            <div class="form-group{{ $errors->has('instalment_no') ? ' has-error' : '' }}">

                                <label for="instalment_no" class="col-md-12">Instalment No</label>

                                <div class="col-md-12">
                                    <input id="instalment_no" type="text" class="form-control" name="instalment_no" value="{{ old('instalment_no') }}" autofocus>

                                    @if ($errors->has('instalment_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('instalment_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <!-- Instalment -->
                            <div class="form-group{{ $errors->has('instalment') ? ' has-error' : '' }}">

                                <label for="instalment" class="col-md-12">Instalment</label>

                                <div class="col-md-12">
                                    <input id="instalment" type="text" class="form-control" name="instalment" value="{{ old('instalment') }}" autofocus>

                                    @if ($errors->has('instalment'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('instalment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <!-- Borrow -->
                            <div class="form-group{{ $errors->has('borrow') ? ' has-error' : '' }}">

                                <label for="borrow" class="col-md-12">Borrow</label>

                                <div class="col-md-12">
                                    <input id="borrow" type="text" class="form-control" name="borrow" value="{{ old('borrow') }}" autofocus>

                                    @if ($errors->has('borrow'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('borrow') }}</strong>
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
