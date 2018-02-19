@extends('layouts.master')
@section('title', 'Employee-salary')

@section('header')

    Employee 
    <small>Salary rule list</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="btn-group">
                    <a href="{{ url('employee/salary-rule/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="25%">Name</th>
                            <th width="10%">Type</th>
                            <th width="10%">Amount</th>
                            <th width="30%">Details</th>
                            <th width="10%">Status</th>
                            <th width="85px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employeeSalaryRules as $rule)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rule->name }}</td>
                                <td>{{ $rule->type }}</td>
                                <td>
                                    {{ $rule->amount }} 
                                    @if ( $rule->amount_type === 'percent' )
                                        (%)
                                    @else
                                        (TK)
                                    @endif
                                </td>
                                <td>{{ $rule->description }}</td>
                                <td>
                                    @if ( $rule->confirmed == 1)
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
                                    <a href="{{ route('salary-rule.edit', $rule->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Update">
                                        Edit
                                    </a>

                                    <form action="{{ route('salary-rule.destroy',$rule->id) }}"  method="POST" class="pull-right">
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
                                    <a href="{{ url('employee/salary-rule/create') }}" class="alert-link">new one</a> 
                                    type.
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
