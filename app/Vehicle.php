<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected  $table = 'vehicles';

    protected $fillable = [
    	'model', 'refrigeration', 'volume_capacity', 'load_capacity',
    	'vehicle_type_id', 'fuel_type_id', 'plaque', 'fragile'
    ];

    public function type(){
        return $this->belongsTo('App\Vehicle_type','vehicle_type_id');
    }

    public function fuel(){
        return $this->belongsTo('App\Fuel_type','fuel_type_id');
    }


    public function packages(){
        return $this->hasMany('App\Package');
    }
}
