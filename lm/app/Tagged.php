<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagged extends Model
{
    // This model is pivot model!
	public $timestamps = false;
    public $table = 'item_tag';

    public function tag() {
    	return $this->belongsTo('App\Tag');
    }

    public function item() {
    	return $this->belongsTo('App\Item');
    }
}
