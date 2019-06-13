<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asigned_vehicle extends Model
{
    protected $table = "asigned_vehicle";

    protected $fillable = [
    	'package_id', 'vehicle_id', 'distance', 'cost', 'value','winner'
    ];

    public function package(){
    	return $this->belongsTo('App\Package');
    }


    public function vehicle(){
    	return $this->belongsTo('App\Vehicle');
    }

}
