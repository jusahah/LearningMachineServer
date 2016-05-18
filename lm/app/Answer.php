<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modeltraits\PrintDateTimes;

class Answer extends Model
{
    use PrintDateTimes;

    public function question() {
    	return $this->belongsTo('App\Question');
    }

    public function isCorrect() {
    	return $this->correct == 1;
    }

    public function answerPreview() {
    	return str_limit($this->answergiven, 32);
    }
}
