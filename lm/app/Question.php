<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Modeltraits\PrintDateTimes;
use App\Answer;

use DB;

class Question extends Model
{
    use PrintDateTimes;
    //
    protected $guarded = [];

    // Override
    public static function create(array $attributes = []) {


        DB::transaction(function() use ($attributes) {
            $question = parent::create($attributes);

            // We need to create matching sequenceable for the question

            Sequenceable::create([
                'user_id' => $question->item->user_id,
                'sequenceable_id' => $question->id,
                'sequenceable_type' => Question::class
            ]);  
        });
     

    }

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

    public function sequencesQuestionIsMemberOf() {

    	// We must group by sequence id so same sequence is not counted twice

    	return $this->sequenceable->sequences->groupBy(function($seq) {
    		return $seq->id;
    	})->map(function($grouped) {
    		return $grouped->first();
    	});
    }

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
    	// Percentage of correct answers out of all answers
    	$answers = $this->answers;

    	if ($answers->count() === 0) return '---';

    	$corrects = $answers->filter(function($answer) {
    		return $answer->isCorrect();
    	});
    	return round($corrects->count() / $answers->count(), 2) * 100;

    }

    public function questionPreview() {
    	return str_limit($this->question, 32);
    }

    public function getAnswersByDate() {
    	return $this->answers->sortBy('created_at');
    }

    public static function doesUserOwnThisQuestionId($id, $user) {
        $question = self::findOrFail($id);
        return $question->item->user == $user;
    }

}
