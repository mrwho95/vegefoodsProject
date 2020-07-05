<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    //declare table
    //eloquent relationship
    //model method

    protected $fillable = ['user_id', 'fullname', 'address', 'amount', 'delivery', 'totalprice'];

    public function orderdetails()
	{
	    return $this->hasMany('App\orderdetails', 'order_id', 'id');
	}
}
