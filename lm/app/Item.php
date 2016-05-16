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
    	return $this->belongsToMany('App\Tag');
    }


    // Override Laravel implementation!
    public function delete() {

    	// We make sure we delete also the real model (textItem, imageItem, etc.)
    	$this->itenable->delete();
    	$this->delete();
    }
}
