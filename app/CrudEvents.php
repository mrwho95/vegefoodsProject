<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrudEvents extends Model
{
    protected $fillable = [
        'name', 
        'start', 
        'end'
    ];    
}
