<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\LatestAddition;

class Item extends Model
{
    //
    public function category() {
    	return $this->belongsTo('App\Category');
    }

	public function sequenceable() {
    	return $this->morphOne('App\Sequenceable', 'sequenceable');
    }

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

    // Instance methods

    public function returnYourPortionOfSequence() {
    	return $this->itenable;
    }

}
