<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Modeltraits\PrintDateTimes;
use App\Answer;

class Question extends Model
{
    use PrintDateTimes;
    //
	public function sequenceable() {
    	return $this->morphOne('App\Sequenceable', 'sequenceable');
    }

    public function item() {
    	return $this->belongsTo('App\Item');
    }

    public function answers() {
    	return $this->hasMany('App\Answer');
    }

    // Instance methods

    public function returnYourPortionOfSequence() {
    	return $this;
    }

    public function delete() {
    	echo "Deleting question: " . $this->id . "\n";
    	$this->sequenceable()->delete();
    	parent::delete();

    }
    // Adapter to interface sequenceable
    public function getNameAttribute() {
    	return $this->question;
    }

    public function getTypeAttribute() {
    	return 'Teksti';
    }

    public function lastAnswerTime() {

    	$lastAnswer = Answer::where('question_id', $this->id)->orderBy('created_at')->first();
    	
    	if ($lastAnswer) return $lastAnswer->printCreatedAt();
    	return '---';
    }

    public function answerCount() {
    	return $this->answers->count();
    } 

    public function correctPercent() {
    	$answers = $this->answers;

    	if ($answers->count() === 0) return '---';

    	$corrects = $answers->filter(function($answer) {
    		return $answer->isCorrect();
    	});
    	return round($corrects->count() / $answers->count(), 2) * 100;

    }

}
