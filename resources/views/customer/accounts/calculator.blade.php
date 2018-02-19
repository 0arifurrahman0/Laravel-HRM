@extends('layouts.master')
@section('title', 'calculate')

@section('header')

    Loan 
    <small>Calculate</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">

            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ url('calculator') }}">
                {{ csrf_field() }}

                <div class="box-body">

                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                        <label for="amount" class="col-md-4 control-label">Loan Amount</label>
                        <div class="col-md-8">
                            <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
                        <label for="rate" class="col-md-4 control-label">Interest Rate</label>
                        <div class="col-md-8">
                            <input id="rate" type="text" class="form-control" name="rate" value="{{ old('rate') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                        <label for="year" class="col-md-4 control-label">Year</label>
                        <div class="col-md-8">
                            <input id="year" type="text" class="form-control" name="year" value="{{ old('year') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('instalment') ? ' has-error' : '' }}">
                        <label for="instalment" class="col-md-4 control-label">Instalment peryear</label>
                        <div class="col-md-8">
                            <input id="instalment" type="text" class="form-control" name="instalment" value="{{ old('instalment') }}" autofocus>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Calculate
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
