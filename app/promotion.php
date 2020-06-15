<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    //
    protected $fillable = ['name', 'code', 'discount', 'expired', 'availability'];
}
