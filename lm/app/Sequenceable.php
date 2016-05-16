<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Interface for all models that can be put inside Sequence!
class Sequenceable extends Model
{

    public $timestamps = false;

    public function sequences() {
    	return $this->belongsToMany('App\Sequence');
    }

    public function sequenceable() {
    	return $this->morphTo();
    }
}
