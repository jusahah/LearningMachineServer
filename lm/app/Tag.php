<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function items() {
    	// Using Tagged model as pivot table
    	return $this->belongsToMany('App\Item');
    }
}
