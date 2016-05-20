<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public $timestamps = false;
    protected $guarded = [];
    
    public function items() {
    	// Using Tagged model as pivot table
    	return $this->belongsToMany('App\Item');
    }

    public static function createOrGet($tag, $userID) {
    	$tag = trim($tag);

    	return Tag::firstOrCreate([
    		'user_id' => $userID,
    		'name' => $tag
    	]);
    }
}
