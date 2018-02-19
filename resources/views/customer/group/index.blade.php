@extends('layouts.master')
@section('title', 'customer')

@section('header')

    Customer 
    <small>Group list</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ url('customer/group/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="15%">Branch</th>
                            <th width="15%">Name</th>
                            <th width="45%">Details</th>
                            <th width="10%">Status</th>
                            <th width="85px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customerGroups as $group)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $group->branch->name }}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->description }}</td>
                                <td>
                                    @if ( $group->confirmed == 1)
                                        <span class="label label-success">
                                            Approved
                                        </span>
                                    @else
                                        <span class="label label-warning">
                                            Pending
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('group.edit', $group->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Update">
                                        Edit
                                    </a>

                                    <form action="{{ route('group.destroy',$group->id) }}"  method="POST" class="pull-right">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input class="btn btn-xs btn-danger" type="submit" value="Del" data-toggle="tooltip" data-placement="top" title="Delete">
                                    </form>
                                </td>
                            </tr>

                        @empty

                            <div class="callout callout-info">
                                <h4>Heads up!</h4>
                                <p>
                                    Create 
                                    <a href="{{ url('customer/group/create') }}" class="alert-link">new one</a> 
                                    group.
                                </p>
                            </div>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection