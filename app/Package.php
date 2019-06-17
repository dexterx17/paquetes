<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected  $table = 'packages';

    protected $fillable = [
    	'description', 'length', 'width', 'height', 
    	'weight', 'refrigeration', 'origen', 'destino',
        'min_temp', 'max_temp', 'assign_attempt'
    ];

    public function vehicles(){
        return $this->hasMany('App\Asigned_vehicle');
    }

    public function getVolumetricWeightAttribute(){
    	return ($this->length*$this->width*$this->height)/5000;
    }
}
