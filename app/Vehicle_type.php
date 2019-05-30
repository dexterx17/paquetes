<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    protected  $table = 'vehicle_types';

    protected $fillable = [
    	'type', 'description', 'kilometers_per_gallon',
    	'cost_per_kilometer',    	'maintenance'
    ];
    
    public function vehicles(){
        return $this->hasMany('App\Vehicle');
    }
}
