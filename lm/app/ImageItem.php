<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Should perhaps implement Itenable interface
class ImageItem extends Model
{
	protected static $itenable_typename = 'App\ImageItem';

	public $timestamps = false;
    protected $guarded = [];
	public static function createItem($attributes) {
    	// Perhaps validate here first?

    	// Note! This method takes care of adding models to two tables!
    	// First we add textItem, then we create generic superclass model
    	// to the Items-table

    	$concreteItem = self::create([
    		'imagepath' => env('S3_BASE_URL') . '/' . $attributes['filekey'],
    		'thumbnail' => $attributes['thumbnail'],
    		'user_id'   => $attributes['user_id']
    	]);

    	$attributes['itenable_typename'] = self::$itenable_typename;
    	$attributes['itenable_id'] = $concreteItem->id;  

    	Item::createItem($attributes); // Create wrapper item

    }

    public function item() {
    	return $this->morphOne('App\Item', 'itenable');
    }

    // Display methods
    public function singleTemplateName() {
    	return 'image';
    }
}
