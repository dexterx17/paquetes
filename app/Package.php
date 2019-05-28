<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected  $table = 'packages';

    protected $fillable = [
    	'description', 'length', 'width', 'height', 
    	'weight', 'refrigeration', 'origen', 'destino'
    ];

    public function vehicle(){
        return $this->hasOne('App\Vehicle');
    }

    public function getVolumetricWeightAttribute(){
    	return ($this->length*$this->width*$this->height)/5000;
    }
}
