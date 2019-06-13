<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected  $table = 'vehicles';

    protected $fillable = [
    	'model', 'refrigeration', 'width', 'height', 'weight', 'length',
        'min_rf', 'max_rf','vehicle_type_id', 'fuel_type_id', 'plaque'
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
