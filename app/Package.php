<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected  $table = 'packages';

    protected $fillable = [
    	'description', 'length', 'width', 'height', 
    	'weight', 'refrigeration', 'fragile', 'origen', 'destino', 'vehicle_id'
    ];

    public function vehicle(){
    	return $this->belongsTo('App\Vehicle');
    }
}
