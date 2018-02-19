<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerBorrow extends Model
{
	use SoftDeletes;
    protected $guarded = [];

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }


	/**
	* The attributes that should be mutated to dates.
	*
	* @var array
	*/
	protected $dates = ['deleted_at'];
}
