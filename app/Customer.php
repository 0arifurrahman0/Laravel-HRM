<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
	use SoftDeletes;
    protected $guarded = [];

    public function customerGroup()
    {
    	return $this->belongsTo('App\CustomerGroup');
    }

	/**
	* The attributes that should be mutated to dates.
	*
	* @var array
	*/
	protected $dates = ['deleted_at'];
}
