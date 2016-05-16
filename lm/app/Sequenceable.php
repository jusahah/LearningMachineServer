<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Interface for all models that can be put inside Sequence!
class Sequenceable extends Model
{

    public $timestamps = false;

    public function sequences() {
    	return $this->belongsToMany('App\Sequence')->withPivot('order');
    }

    public function sequenceable() {
    	return $this->morphTo();
    }

    // Instance methods

    public function returnYourPortionOfSequence() {

    	return $this->sequenceable->returnYourPortionOfSequence();

    }
}
