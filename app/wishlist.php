<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    //
    protected $fillable = ['user_id', 'product_id', 'productName', 'productPrice', 'wishQuantity', 'specificProductCost'];
}
