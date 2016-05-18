<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

use App\Modeltraits\PrintDateTimes;

use App\Sequenceable;


class Sequence extends Model
{
    //
    use PrintDateTimes; // Contains printing formatting for Carbon objects etc
    
	public function sequenceable() {
    	return $this->morphOne('App\Sequenceable', 'sequenceable');
    }
    

    public function sequenceables() {
    	return $this->belongsToMany('App\Sequenceable')->withPivot('order');
    }

    public function getLength() {
    	return $this->sequenceables->count();
    }

    public function saveNewOrder($orderArray) {
    	// Check all sequenceables belong to User
    	$ids = collect($orderArray)->map(function($arrItem) {
    		return (int)$arrItem->id;
    	});
    	
    	// Check user owns sequencables he is adding to sequence
    	// throws SequenceableNotOwnedByUser if not so
    	$sequenceables = Sequenceable::getIfCurrentUserOwnsTheseIds($ids->unique()->toArray());

    	// Turn unique sequenceables into map for lookup phase
    	$sequenceableMap = [];
    	$sequenceables->each(function($s) use (&$sequenceableMap) {
    		$sequenceableMap[$s->id] = $s;
    	});

    	// Replace in original id array the id with actual sequenceable
    	$allSequenceables = $ids->map(function($id) use ($sequenceableMap) {
    		return $sequenceableMap[$id];
    	});


    	// All is fine
    	$this->replaceOrderedSequenceables($allSequenceables);





    }

    public function replaceOrderedSequenceables($sequenceables) {
    	// Check for circular dependencies
    	/*
    	$sequenceables->map(function($sequenceable, $key) {
    		echo $sequenceable->id . " | " . $sequenceable->sequenceable_type . "\n";
    	});
    	*/


    	$sequenceables = $this->flattenPossibleNestedSequences($sequenceables);

    	
    	// We wrap the stuff in transaction
    	// On the end we check for circular dependencies - if present

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

    protected function flattenPossibleNestedSequences($sequenceables) {
    	return $sequenceables->map(function($sequenceable, $key) {
    		
    		if ($sequenceable->isSequence()) {
    			
    			return $sequenceable->sequenceable->sequenceables->sortBy(function($s) {
    				return $s->order;
    			});
    		} else {
    			return $sequenceable;
    		}
    	})->flatten();   	
    }

    public function actualType() {
    	return strtolower($this->printType());
    }

    public function printType() {
    	$className = $this->itenable_type;
    	return trans("classnames.$className");
    }
/*
    protected function searchCircular($sequenceables, $listOfUsedSeqs) {
    	echo "\n\n";
    	echo "Count: " . $sequenceables->count();
    	echo "\n-------Search circular--------\n";
    	print_r($listOfUsedSeqs);

    	$sequenceables->each(function($sequenceable, $key) use (&$listOfUsedSeqs) {
    		echo $sequenceable->sequenceable_type . " | " . $sequenceable->id;
    		echo "\n";
    		if ($sequenceable->isSequence()) {
    			echo " Sequence found ";
    			// If we have met this sequence already, there is circular dep.
    			if (in_array($sequenceable->id, $listOfUsedSeqs)) {
    				echo "ERROR CircularDependency";
    				throw new CircularDependency;
    			}
    			// Set this sequence as met so we can not meet it again
    			array_push($listOfUsedSeqs, $sequenceable->id);
    			$sequence = $sequenceable->sequenceable;
    			echo "This far: " . $sequenceable->id;
    			echo "\nNext run for sequence: " . $sequence->id . "\n";
    			echo "\nNext run for sequenceable: " . $sequenceable->id . "\n";
    			echo "\nSequeceables count: " . $sequence->sequenceables->count() . "\n";
    			$sequence->searchCircular($sequence->sequenceables, $listOfUsedSeqs);
    		}
    	});
    }
*/

}
