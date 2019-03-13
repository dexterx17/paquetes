<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel_type extends Model
{
    protected  $table = 'fuel_types';

    protected $fillable = [
    	'type', 'description', 'cost'
    ];
}
