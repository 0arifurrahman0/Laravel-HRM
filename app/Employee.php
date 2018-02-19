<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
	use SoftDeletes;
    protected $guarded = [];

    public function employeeDepartment()
    {
    	return $this->belongsTo('App\EmployeeDepartment');
    }

    public function employeeDesignation()
    {
    	return $this->belongsTo('App\EmployeeDesignation');
    }

    public function employeePayScale()
    {
        return $this->belongsTo('App\EmployeePayScale');
    }

    public function employeeType()
    {
        return $this->belongsTo('App\EmployeeType');
    }

    public function employeeWorkingShift()
    {
        return $this->belongsTo('App\EmployeeWorkingShift');
    }

	/**
	* The attributes that should be mutated to dates.
	*
	* @var array
	*/
	protected $dates = ['deleted_at'];
}
