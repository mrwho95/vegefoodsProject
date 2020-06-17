<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customermessage extends Model
{
    //
    protected $fillable = ['name', 'email', 'subject', 'message'];
}
