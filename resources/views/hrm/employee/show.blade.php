@extends('layouts.master')
@section('title', 'employee')

@section('header')

    Employee 
    <small>show</small>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">

            <div class="box-header with-border">
                <div class="btn-group">

                    <a href="{{ url('employee') }}" class="btn btn-default">
                        List
                    </a>

                    <a href="{{ url('employee/create') }}" class="btn btn-default">
                        Create
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table" style="width:100%; margin-bottom: 15px;">
                    <tbody>
                        <tr>
                            <td style="width:70%; float:left;">
                                <h3>{{ $employee->name }}</h3>
                                <address>
                                    <p>
                                        <strong>Designation:</strong> 
                                        {{ $employee->employeeDesignation->name }}
                                    </p>
                                    <p>
                                        <strong>Mobile:</strong> 
                                        {{ $employee->phone }}
                                    </p>
                                    <p>
                                        <strong>E-mail:</strong> 
                                        {{ $employee->email }}
                                    </p>                         
                                </address>                      
                            </td>
                            <td style="width:30%; text-align:right;">
                                <img style="border-radius: 3px; width:120px; margin-top: 22px;" src="{{ asset('storage') }}/{{ $employee->avatar }}" alt="" />
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="col-md-6">
                    {{-- Personal Information --}}
                    <h4>Personal Information</h4>
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td>Father's Name <strong>:</strong></td>
                                <td>{{ $employee->father_name }}</td>
                            </tr>
                            <tr>
                                <td>Mother's Name <strong>:</strong></td>
                                <td>{{ $employee->mother_name }}</td>
                            </tr>
                            <tr>
                                <td>Birthday <strong>:</strong></td>
                                <td>{{ $employee->birthday }}</td>
                            </tr>
                            <tr>
                                <td>Gender <strong>:</strong></td>
                                <td>{{ $employee->gender }}</td>
                            </tr>
                            <tr>
                                <td>Marital Status <strong>:</strong></td>
                                <td>{{ $employee->marital_status }}</td>
                            </tr>
                            <tr>
                                <td>National ID No <strong>:</strong></td>
                                <td>{{ $employee->nid }}</td>
                            </tr>
                            <tr>
                                <td>Blood Group <strong>:</strong></td>
                                <td>{{ $employee->blood_group }}</td>
                            </tr>
                            <tr>
                                <td>Present Addres <strong>:</strong></td>
                                <td>{{ $employee->present_addres }}</td>
                            </tr>
                            <tr>
                                <td>Permanent Addres <strong>:</strong></td>
                                <td>{{ $employee->permanent_addres }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    {{-- Personal Information --}}
                    <h4>Organizational Informaiton</h4>
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td>Joining Date <strong>:</strong></td>
                                <td>{{ $employee->join }}</td>
                            </tr>
                            <tr>
                                <td>Department <strong>:</strong></td>
                                <td>{{ $employee->employeeDepartment->name }}</td>
                            </tr>
                            <tr>
                                <td>Working Schedule <strong>:</strong></td>
                                <td>{{ $employee->employeeType->name }}</td>
                            </tr>
                            <tr>
                                <td>Working Shift <strong>:</strong></td>
                                <td>{{ $employee->employeeWorkingShift->name }}</td>
                            </tr>
                            <tr>
                                <td>PayScale <strong>:</strong></td>
                                <td>{{ $employee->employeePayScale->name }}</td>
                            </tr>
                            <tr>
                                <td>Education <strong>:</strong></td>
                                <td>{{ $employee->education }}</td>
                            </tr>
                            <tr>
                                <td>Short history <strong>:</strong></td>
                                <td>{{ $employee->remark }}</td>
                            </tr>
                            <tr>
                                <td>CV <strong>:</strong></td>
                                <td>
                                    <a href="{{ asset('storage') }}/{{ $employee->cv }}" target="_blank">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Signature <strong>:</strong></td>
                                <td>
                                    <img src="{{ asset('storage') }}/{{ $employee->signature }}" alt="" style="width:100px; height: auto;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>           
        </div>
    </div>
</div>
@endsection
