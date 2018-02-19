<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeAttendance extends Model
{
	use SoftDeletes;
    protected $guarded = [];

	public function employee()
	{
		return $this->belongsTo('App\Employee');
	}    

	/**
	* The attributes that should be mutated to dates.
	*
	* @var array
	*/
	protected $dates = ['deleted_at'];
}
