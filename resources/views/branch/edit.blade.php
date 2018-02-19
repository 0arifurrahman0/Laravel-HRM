@extends('layouts.master')
@section('title', 'branch')

@section('header')

    Branch 
    <small>update</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="{{ url('branch/create') }}" class="btn btn-default">
                        Create
                    </a>
                    <a href="{{ url('branch') }}" class="btn btn-default">
                        List
                    </a>
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('branch.update',$branch->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="box-body">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <label for="name" class="col-md-4 control-label">Branch Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $branch->name }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                        <label for="description" class="col-md-4 control-label">Branch Description</label>

                        <div class="col-md-8">

                            <textarea name="description" class="form-control" id="description" cols="30" rows="4" autofocus>{{ $branch->description }}</textarea>

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
                                    @if ($branch->confirmed == 1)
                                        checked="checked"
                                    @endif
                                > 
                                Enable
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="confirmed" value="0"
                                    @if ($branch->confirmed == 0)
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