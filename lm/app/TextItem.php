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
    	$item = new Item();
    	$item->name = $attributes['name'];
    	$item->summary = $attributes['summary'];
    	$item->category_id = $attributes['category_id'];
    	$item->user_id = $attributes['user_id'];
    	$item->itenable_type = self::$itenable_typename;
    	$item->itenable_id   = $concreteItem->id;
    	$item->save();

    }

    public function item() {
    	return $this->morphOne('App\Item', 'itenable');
    }
}
