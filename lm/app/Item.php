<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //

    public function itenable() {
    	return $this->morphTo();
    }

    public function tags() {
    	// Using Tagged model as pivot table
    	return $this->belongsToMany('app\Tag');
    }
}
