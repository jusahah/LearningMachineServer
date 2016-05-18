<?php 

namespace App\Modeltraits;
use Carbon\Carbon;

trait PrintDateTimes {

	public function printCreatedAt() {
    	$c = new Carbon($this->created_at);
    	return $c->toDateTimeString();
    }
}