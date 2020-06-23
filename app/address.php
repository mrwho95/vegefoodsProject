<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    //
    protected $fillable = ['user_id', 'fullname', 'phonenumber', 'streetaddress1', 'streetaddress2', 'city', 'state', 'postcode', 'country', 'defaultaddress'];
}
