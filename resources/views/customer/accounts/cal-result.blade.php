@extends('layouts.master')
@section('title', 'department')

@section('header')

    Loan 
    <small>Calculator</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ url('/') }}" class="btn btn-default">
                        Go Back
                    </a>
                </div>
            </div>

            <div class="box-body">
                <div class="text-center">
                    <h1>Hey, I'm waiting for your info.</h1>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
