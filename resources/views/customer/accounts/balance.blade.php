@extends('layouts.master')
@section('title', 'balance')

@section('header')

    Customer 
    <small>balance</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ url('customer/balance') }}">
                {{ csrf_field() }}

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
                    </div>
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Check balance
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
