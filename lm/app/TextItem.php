<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextItem extends Model
{
    //

    public function item() {
    	return $this->morphOne('App\Item', 'itenable');
    }
}
