<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\LatestAddition;
use App\Tag;
use App\Tagged;
use Carbon\Carbon;

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

    public static function createItem($attributes) {

    	$tags = collect(explode(',', $attributes['tags']));

    	$tagModels = $tags->map(function($tag) use ($attributes) {
    		return Tag::createOrGet($tag, $attributes['user_id']);
    	});

    	$item = new self();
    	$item->name = $attributes['name'];
    	$item->summary = $attributes['summary'];
    	$item->category_id = $attributes['category_id'];
    	$item->user_id = $attributes['user_id'];
    	$item->itenable_type = $attributes['itenable_typename'];
    	$item->itenable_id   = $attributes['itenable_id'];
    	$item->save();

    	$tagModels->each(function($tagModel) use ($item) {
    		Tagged::create([
    			'item_id' => $item->id,
    			'tag_id'  => $tagModel->id
    		]);
    	});

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

    public function sequencesItemIsMemberOf() {
    	// We must group by sequence id so same sequence is not counted twice

    	return $this->sequenceable->sequences->groupBy(function($seq) {
    		return $seq->id;
    	})->map(function($grouped) {
    		return $grouped->first();
    	});

 

    }



    // Display methods

    public function actualType() {
    	return strtolower($this->printType());
    }

    public function printType() {
    	$className = $this->itenable_type;
    	return trans("classnames.$className");
    }

    public function printCategory() {
    	return $this->category->name;
    }

    public function printFullSummary() {
    	// Max 32 chars...
    	return $this->summary;
    }
    public function printMediumSummary() {
    	// Max 32 chars...
    	return str_limit($this->summary, 256);
    }
    public function printSummary() {
    	// Max 32 chars...
    	return str_limit($this->summary, 32);
    }

    public function printCreatedAt() {
    	$c = new Carbon($this->created_at);
    	return $c->toDateTimeString();
    }

}
