@extends('layouts.master')
@section('title', 'group')

@section('header')

    Customer 
    <small>Group update</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="{{ url('customer/group/create') }}" class="btn btn-default">
                        Create
                    </a>
                    <a href="{{ url('customer/group') }}" class="btn btn-default">
                        List
                    </a>
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('group.update',$customerGroup->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="box-body">

                    <!-- branch -->
                    <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">

                        <label for="branch_id" class="col-md-4 control-label">
                            Branch
                        </label>

                        <div class="col-md-8">
                            <select id="branch_id" class="form-control" name="branch_id" autofocus>
                                <option value="0">Select one</option>
                                @forelse ( $branches as $branch )
                                    <option value="{{ $branch->id }}"
                                        {{ $customerGroup->branch_id == $branch->id ? 'selected' : '' }}
                                        >
                                        {{ $branch->name }}
                                    </option>
                                @empty
                                    <option value="0">No pay branch found</option>
                                @endforelse
                                
                            </select>                                    

                            @if ($errors->has('branch_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('branch_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <label for="name" class="col-md-4 control-label">Group Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $customerGroup->name }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

                        <label for="description" class="col-md-4 control-label">Group Description</label>

                        <div class="col-md-8">

                            <textarea name="description" class="form-control" id="description" cols="30" rows="4" autofocus>{{ $customerGroup->description }}</textarea>

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
                                    @if ($customerGroup->confirmed == 1)
                                        checked="checked"
                                    @endif
                                > 
                                Enable
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="confirmed" value="0"
                                    @if ($customerGroup->confirmed == 0)
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