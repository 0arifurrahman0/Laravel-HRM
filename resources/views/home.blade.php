@extends('layouts.master')
@section('title', 'Home')

@section('header')

    Dashboard
    <small>All report</small>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                General Report
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ $employee }}</h3>

                                <p>Total Employee</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ $department }}</h3>

                                <p>Total Department</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $customer }}</h3>

                                <p>Total Customer</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ $group }}</h3>

                                <p>Total Group</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-object-group" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                Accounts Report
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ $loanPay }}</h3>

                                <p>Total Loan pay</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ $loanReceive }}</h3>

                                <p>Total Loan received</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $customerSavings }}</h3>

                                <p>Total Customer savings</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ $savingsWithdraw }}</h3>

                                <p>Total customer withdraw</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
