@extends('layouts.master')
@section('title', 'customer')

@section('header')

    Customer 
    <small>create</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">

                    <a href="{{ url('customer') }}" class="btn btn-default">
                        List
                    </a>
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Group -->
                            <div class="form-group{{ $errors->has('customer_group_id') ? ' has-error' : '' }}">

                                <label for="customer_group_id" class="col-md-4 control-label">
                                    Group
                                </label>

                                <div class="col-md-8">
                                    <select id="customer_group_id" class="form-control" name="customer_group_id" autofocus>
                                        <option value="0">Select one</option>
                                        @forelse ( $customerGroups as $group )
                                            <option 
                                                value="{{ $group->id }}" 
                                                {{ old('customer_group_id') ? 'selected' : '' }} 
                                            >
                                                {{ $group->name }}
                                            </option>
                                        @empty
                                            <option value="0">No group found</option>
                                        @endforelse
                                        
                                    </select>                                    

                                    @if ($errors->has('customer_group_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('customer_group_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- accounts_no -->
                            <div class="form-group{{ $errors->has('accounts_no') ? ' has-error' : '' }}">

                                <label for="accounts_no" class="col-md-4 control-label">Accounts No</label>

                                <div class="col-md-8">
                                    <input id="accounts_no" type="text" class="form-control" name="accounts_no" value="{{ old('accounts_no') }}" autofocus>

                                    @if ($errors->has('accounts_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('accounts_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Name -->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- father -->
                            <div class="form-group{{ $errors->has('father') ? ' has-error' : '' }}">

                                <label for="father" class="col-md-4 control-label">Father's Name</label>

                                <div class="col-md-8">
                                    <input id="father" type="text" class="form-control" name="father" value="{{ old('father') }}" autofocus>

                                    @if ($errors->has('father'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('father') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- husband -->
                            <div class="form-group{{ $errors->has('husband') ? ' has-error' : '' }}">

                                <label for="husband" class="col-md-4 control-label">Husband's Name</label>

                                <div class="col-md-8">
                                    <input id="husband" type="text" class="form-control" name="husband" value="{{ old('husband') }}" autofocus>

                                    @if ($errors->has('husband'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('husband') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                                <label for="phone" class="col-md-4 control-label">Phone</label>

                                <div class="col-md-8">
                                    <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Addres -->
                            <div class="form-group{{ $errors->has('addres') ? ' has-error' : '' }}">

                                <label for="addres" class="col-md-4 control-label">
                                    Addres
                                </label>

                                <div class="col-md-8">

                                    <textarea name="addres" class="form-control" id="addres" cols="30" rows="4" autofocus>{{ old('addres') }}</textarea>

                                    @if ($errors->has('addres'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('addres') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- description -->
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                                <label for="remark" class="col-md-4 control-label">
                                    Description
                                </label>

                                <div class="col-md-8">

                                    <textarea name="description" class="form-control" id="description" cols="30" rows="3" autofocus>{{ old('description') }}</textarea>

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
                                        <input type="radio" name="confirmed" value="1" checked="checked"> 
                                        Enable
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="confirmed" value="0"> 
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
