<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Item;

class LatestAddition extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function item() {
    	return $this->hasOne('App\Item');
    }
}
