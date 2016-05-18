<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Exceptions\SequenceableNotOwnedByUser;

use App\Sequence;

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

    public static function getIfCurrentUserOwnsTheseIds($ids) {
    	$sequenceables = self::whereIn('id', $ids)->get();
    	$userID = \Auth::id();
    	$sequenceables->each(function($sequenceable) use ($userID) {
    		if ($sequenceable->user_id != $userID) {
    			throw new SequenceableNotOwnedByUser;
    		}
    	});

    	return $sequenceables;
    }

    public function returnYourPortionOfSequence() {

    	return $this->sequenceable->returnYourPortionOfSequence();
    }

    public function isSequence() {
    	return $this->sequenceable_type == 'App\Sequence';
    }

    public function actualType() {
    	return strtolower($this->printType());
    }

    public function printType() {
    	$className = $this->sequenceable_type;
    	return trans("classnames.$className");
    }
}
