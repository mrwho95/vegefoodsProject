<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
    //
    protected $fillable = ['order_id','product_id', 'productName', 'productPrice', 'wishQuantity'];
}
