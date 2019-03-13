<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected  $table = 'vehicles';

    protected $fillable = [
    	'model', 'refrigeration', 'volume_capacity', 'load_capacity',
    	'vechile_type_id', 'fuel_type_id', 'plaque'
    ];
}
