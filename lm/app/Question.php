<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    public function item() {
    	return $this->belongsTo('App\Item');
    }

    public function answers() {
    	return $this->hasMany('App\Answer');
    }
}
