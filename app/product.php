<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable = ['name', 'price', 'weight', 'category', 'quantity', 'description', 'photo'];
}
