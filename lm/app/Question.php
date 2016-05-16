<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
	public function sequenceable() {
    	return $this->morphMany('App\Sequenceable', 'sequenceable');
    }

    public function item() {
    	return $this->belongsTo('App\Item');
    }

    public function answers() {
    	return $this->hasMany('App\Answer');
    }
}
