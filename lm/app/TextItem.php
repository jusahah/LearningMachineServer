<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Item;

class TextItem extends Model
{
	protected static $itenable_typename = 'App\TextItem';

	public $timestamps = false;
	public static function createItem($attributes) {
    	// Perhaps validate here first?

    	// Note! This method takes care of adding models to two tables!
    	// First we add textItem, then we create generic superclass model
    	// to the Items-table

    	$concreteItem = self::create([
    		'note' => $attributes['note'],
    		'user_id' => $attributes['user_id']
    	]);
    	// We then create superclass item that works as an interface
    	$attributes['itenable_typename'] = self::$itenable_typename;
    	$attributes['itenable_id'] = $concreteItem->id;

    	Item::createItem($attributes); // Create super class item

    }

    public function item() {
    	return $this->morphOne('App\Item', 'itenable');
    }
    
    // Display methods
    public function singleTemplateName() {
    	return 'text';
    }    
}
