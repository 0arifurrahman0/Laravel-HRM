<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerGroup extends Model
{
	use SoftDeletes;
    protected $guarded = [];

    public function branch()
    {
    	return $this->belongsTo('App\Branch');
    }

	/**
	* The attributes that should be mutated to dates.
	*
	* @var array
	*/
	protected $dates = ['deleted_at'];
}
