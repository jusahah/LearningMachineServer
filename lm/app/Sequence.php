<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    //

    public function sequenceables() {
    	return $this->belongsToMany('App\Sequenceable');
    }
}
