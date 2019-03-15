<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel_type extends Model
{
    protected  $table = 'fuel_types';

    protected $fillable = [
    	'fuel', 'description', 'cost'
    ];

    public function vehicles(){
        return $this->hasMany('App\Vehicle');
    }
}
