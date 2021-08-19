<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrudEvents extends Model
{
    protected $fillable = [
        'event_name', 
        'event_start', 
        'event_end'
    ];    
}
