@extends('layouts.master')
@section('title', 'employee')

@section('header')

    Employee 
    <small>create</small>

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
                </div>
            </div>

            <form role="form" class="form-horizontal" method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="box-body">

                    <h4>Personal Information</h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">

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

                            <!-- Father's Name -->
                            <div class="form-group{{ $errors->has('father_name') ? ' has-error' : '' }}">

                                <label for="father_name" class="col-md-4 control-label">Father's Name</label>

                                <div class="col-md-8">
                                    <input id="father_name" type="text" class="form-control" name="father_name" value="{{ old('father_name') }}" autofocus>

                                    @if ($errors->has('father_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('father_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Mother's Name -->
                            <div class="form-group{{ $errors->has('mother_name') ? ' has-error' : '' }}">

                                <label for="mother_name" class="col-md-4 control-label">Mother's Name</label>

                                <div class="col-md-8">
                                    <input id="mother_name" type="text" class="form-control" name="mother_name" value="{{ old('mother_name') }}" autofocus>

                                    @if ($errors->has('mother_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mother_name') }}</strong>
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

                            <!-- Email -->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Birthday -->
                            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">

                                <label for="birthday" class="col-md-4 control-label">Birthday</label>

                                <div class="col-md-8">
                                    <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" autofocus>

                                    @if ($errors->has('birthday'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birthday') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                           <!--  Gender -->
                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-8">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="male" checked="checked"> 
                                        Male
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="female"> 
                                        Female
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="other"> 
                                        Other
                                    </label>

                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Marital Status -->
                            <div class="form-group{{ $errors->has('marital_status') ? ' has-error' : '' }}">

                                <label for="marital_status" class="col-md-4 control-label">
                                    Marital Status
                                </label>

                                <div class="col-md-8">
                                    <select id="marital_status" class="form-control" name="marital_status" autofocus>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>                                    

                                    @if ($errors->has('marital_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('marital_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- National ID No -->
                            <div class="form-group{{ $errors->has('nid') ? ' has-error' : '' }}">

                                <label for="nid" class="col-md-4 control-label">National ID No</label>

                                <div class="col-md-8">
                                    <input id="nid" type="tel" class="form-control" name="nid" value="{{ old('nid') }}" autofocus>

                                    @if ($errors->has('nid'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nid') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Blood Group -->
                            <div class="form-group{{ $errors->has('blood_group') ? ' has-error' : '' }}">

                                <label for="blood_group" class="col-md-4 control-label">
                                    Blood Group
                                </label>

                                <div class="col-md-8">
                                    <input id="blood_group" type="text" class="form-control" name="blood_group" value="{{ old('blood_group') }}" autofocus>

                                    @if ($errors->has('blood_group'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('blood_group') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Present Addres -->
                            <div class="form-group{{ $errors->has('present_addres') ? ' has-error' : '' }}">

                                <label for="present_addres" class="col-md-4 control-label">
                                    Present Addres
                                </label>

                                <div class="col-md-8">

                                    <textarea name="present_addres" class="form-control" id="present_addres" cols="30" rows="4" autofocus>{{ old('present_addres') }}</textarea>

                                    @if ($errors->has('present_addres'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('present_addres') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Permanent Addres -->
                            <div class="form-group{{ $errors->has('permanent_addres') ? ' has-error' : '' }}">

                                <label for="permanent_addres" class="col-md-4 control-label">
                                    Permanent Addres
                                </label>

                                <div class="col-md-8">
                                    <textarea name="permanent_addres" class="form-control" id="permanent_addres" cols="30" rows="4" autofocus>{{ old('permanent_addres') }}</textarea>

                                    @if ($errors->has('permanent_addres'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('permanent_addres') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- avatar -->
                            <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="avatar" class="col-md-4 control-label">
                                    Photo
                                </label>

                                <div class="col-md-8">

                                    <input type="file" id="avatar" name="avatar" accept="image/*">

                                    <p class="help-block">
                                        Photo must be jpg or png formated and max size 300 kilobytes.
                                    </p>

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- cv -->
                            <div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }}">
                                <label for="cv" class="col-md-4 control-label">
                                    CV
                                </label>

                                <div class="col-md-8">

                                    <input type="file" id="cv" name="cv">

                                    <p class="help-block">
                                        CV must be doc/docx/pdf formated and max size 200 kilobytes.
                                    </p>

                                    @if ($errors->has('cv'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cv') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Signature -->
                            <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }}">
                                <label for="signature" class="col-md-4 control-label">
                                    Signature
                                </label>

                                <div class="col-md-8">

                                    <input type="file" id="signature" name="signature">

                                    <p class="help-block">
                                        Signature must be jpg or png formated and max size 100 kilobytes.
                                    </p>

                                    @if ($errors->has('signature'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('signature') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4>Organizational Informaiton</h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Employee Department -->
                            <div class="form-group{{ $errors->has('employee_department_id') ? ' has-error' : '' }}">

                                <label for="employee_department_id" class="col-md-4 control-label">
                                    Department
                                </label>

                                <div class="col-md-8">
                                    <select id="employee_department_id" class="form-control" name="employee_department_id" autofocus>
                                        <option value="0">Select one</option>
                                        @forelse ( $employeeDepartment as $department )
                                            <option 
                                                value="{{ $department->id }}" 
                                                {{ old('employee_department_id') ? 'selected' : '' }} 
                                            >
                                                {{ $department->name }}
                                            </option>
                                        @empty
                                            <option value="0">No department found</option>
                                        @endforelse
                                        
                                    </select>                                    

                                    @if ($errors->has('employee_department_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('employee_department_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Employee Designation -->
                            <div class="form-group{{ $errors->has('employee_designation_id') ? ' has-error' : '' }}">

                                <label for="employee_designation_id" class="col-md-4 control-label">
                                    Designation
                                </label>

                                <div class="col-md-8">
                                    <select id="employee_designation_id" class="form-control" name="employee_designation_id" autofocus>
                                        <option value="0">Select one</option>
                                        @forelse ( $employeeDesignation as $designation )
                                            <option value="{{ $designation->id }}"
                                                {{ old('employee_designation_id') ? 'selected' : '' }}
                                                >
                                                {{ $designation->name }}
                                            </option>
                                        @empty
                                            <option value="0">No designation found</option>
                                        @endforelse
                                        
                                    </select>                                    

                                    @if ($errors->has('employee_designation_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('employee_designation_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Employee Type -->
                            <div class="form-group{{ $errors->has('employee_type_id') ? ' has-error' : '' }}">

                                <label for="employee_type_id" class="col-md-4 control-label">
                                    Working Schedule
                                </label>

                                <div class="col-md-8">
                                    <select id="employee_type_id" class="form-control" name="employee_type_id" autofocus>
                                        <option value="0">Select one</option>
                                        @forelse ( $employeeType as $type )
                                            <option value="{{ $type->id }}"
                                                {{ old('employee_type_id') ? 'selected' : '' }}
                                                >
                                                {{ $type->name }}
                                            </option>
                                        @empty
                                            <option value="0">No type found</option>
                                        @endforelse
                                        
                                    </select>                                    

                                    @if ($errors->has('employee_type_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('employee_type_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Working Shift -->
                            <div class="form-group{{ $errors->has('employee_working_shift_id') ? ' has-error' : '' }}">

                                <label for="employee_working_shift_id" class="col-md-4 control-label">
                                    Working Shift
                                </label>

                                <div class="col-md-8">
                                    <select id="employee_working_shift_id" class="form-control" name="employee_working_shift_id" autofocus>
                                        <option value="0">Select one</option>
                                        @forelse ( $workingShift as $shift )
                                            <option value="{{ $shift->id }}"
                                                {{ old('employee_working_shift_id') ? 'selected' : '' }}
                                                >
                                                {{ $shift->name }}
                                            </option>
                                        @empty
                                            <option value="0">No shift found</option>
                                        @endforelse
                                        
                                    </select>                                    

                                    @if ($errors->has('employee_working_shift_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('employee_working_shift_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- PayScale -->
                            <div class="form-group{{ $errors->has('employee_pay_scale_id') ? ' has-error' : '' }}">

                                <label for="employee_pay_scale_id" class="col-md-4 control-label">
                                    PayScale
                                </label>

                                <div class="col-md-8">
                                    <select id="employee_pay_scale_id" class="form-control" name="employee_pay_scale_id" autofocus>
                                        <option value="0">Select one</option>
                                        @forelse ( $employeePayScale as $scale )
                                            <option value="{{ $scale->id }}"
                                                {{ old('employee_pay_scale_id') ? 'selected' : '' }}
                                                >
                                                {{ $scale->name }}
                                            </option>
                                        @empty
                                            <option value="0">No pay scale found</option>
                                        @endforelse
                                        
                                    </select>                                    

                                    @if ($errors->has('employee_pay_scale_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('employee_pay_scale_id') }}</strong>
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
                        <div class="col-md-6">
                            <!-- Joining date -->
                            <div class="form-group{{ $errors->has('join') ? ' has-error' : '' }}">

                                <label for="join" class="col-md-4 control-label">
                                    Joining Date
                                </label>

                                <div class="col-md-8">
                                    <input id="join" type="date" class="form-control" name="join" value="{{ old('join') }}" autofocus>

                                    @if ($errors->has('join'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('join') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Education -->
                            <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">

                                <label for="education" class="col-md-4 control-label">
                                    Education
                                </label>

                                <div class="col-md-8">

                                    <textarea name="education" class="form-control" id="education" cols="30" rows="3" autofocus>{{ old('education') }}</textarea>

                                    @if ($errors->has('education'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('education') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Remark -->
                            <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">

                                <label for="remark" class="col-md-4 control-label">
                                    Short history
                                </label>

                                <div class="col-md-8">

                                    <textarea name="remark" class="form-control" id="remark" cols="30" rows="3" autofocus>{{ old('remark') }}</textarea>

                                    @if ($errors->has('remark'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('remark') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-8">
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
