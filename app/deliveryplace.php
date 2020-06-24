<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deliveryplace extends Model
{
    //
    protected $fillable = ['city', 'state', 'postcode', 'country'];
}
