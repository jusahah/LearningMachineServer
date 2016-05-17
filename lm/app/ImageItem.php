<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Should perhaps implement Itenable interface
class ImageItem extends Model
{
	protected static $itenable_typename = 'App\ImageItem';

	public $timestamps = false;
	public static function createItem($attributes) {
    	// Perhaps validate here first?

    	// Note! This method takes care of adding models to two tables!
    	// First we add textItem, then we create generic superclass model
    	// to the Items-table

    	$imageItem = self::create([
    		'imagepath' => $attributes['imagepath'],
    		'thumbnail' => $attributes['thumbnail'],
    		'user_id'   => $attributes['user_id']
    	]);
    	$item = new Item();
    	$item->name = $attributes['name'];
    	$item->summary = $attributes['summary'];
    	$item->category_id = $attributes['category_id'];
    	$item->user_id = $attributes['user_id'];
    	$item->itenable_type = self::$itenable_typename;
    	$item->itenable_id   = $imageItem->id;
    	$item->save();

    }

    public function item() {
    	return $this->morphOne('App\Item', 'itenable');
    }

    // Display methods
    public function singleTemplateName() {
    	return 'image';
    }
}
