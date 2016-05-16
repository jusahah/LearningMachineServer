<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\LatestAddition;

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

    public function questions() {
    	return $this->hasMany('App\Question');
    }


    // Override Laravel implementation!
    public function delete() {

    	// We make sure we delete also the real model (textItem, imageItem, etc.)
    	$this->itenable()->delete();
    	// Route to parent default destructor that delete this guy
    	parent::delete();
    }

}
