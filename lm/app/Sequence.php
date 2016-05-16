<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    //
	public function sequenceable() {
    	return $this->morphMany('App\Sequenceable', 'sequenceable');
    }

    public function sequenceables() {
    	return $this->belongsToMany('App\Sequenceable');
    }

    public function replaceOrderedSequenceables($sequenceables) {
    	// First check + detach if we have old ones
    	$this->sequenceables()->detach();

    	// Attach new sequenceables
    	$sequenceables->each(function($sequenceable, $key) {
    		// We need to attach one-by-one so we can define order
    		$this->sequenceables()->attach($sequenceable, ['order' => $key]);
    	});
    	
    }

    public function returnYourPortionOfSequence() {
    	$portionItems = $this->sequenceables->map(function($seqItem, $key) {
    		return $seqItem->returnYourPortionOfSequence();
    	});

    	return $portionItems->flatten();
    }
}
