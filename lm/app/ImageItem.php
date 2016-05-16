<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageItem extends Model
{
    public function item() {
    	return $this->morphOne('App\Item', 'itenable');
    }
}
