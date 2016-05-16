<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
	public function sequenceable() {
    	return $this->morphOne('App\Sequenceable', 'sequenceable');
    }

    public function item() {
    	return $this->belongsTo('App\Item');
    }

    public function answers() {
    	return $this->hasMany('App\Answer');
    }

    // Instance methods

    public function returnYourPortionOfSequence() {
    	return $this;
    }
}
