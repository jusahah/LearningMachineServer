<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sequence;
use App\Question;
use App\Answer;

use App\Http\Requests\EvaluatedAnswerInRequest;

class PlayController extends Controller
{
    
    public function playSequence(Sequence $sequence) {

    	// Get items to be played in this sequence
    	$sequenceables = $sequence->sequenceables;
    	
    	return view('play.index', compact('sequenceables', 'sequence'));
    }

    public function receiveJSONAnswerWithResult(EvaluatedAnswerInRequest $request) {

        $input = $request->all();

        // Form request checked only data validation, we need to ensure user owns this question
        $questionId = $input['question'];
        if (!Question::doesUserOwnThisQuestionId($questionId, \Auth::user())) {
        	return \Response::json([
        		'result' => 'Not your question'
        	], 403);
        }

        // All is fine
        // Perhaps wrap this away later
        $answer = new Answer;
        $answer->answergiven = $input['answer'];
        $answer->correct = $input['result'];
        $answer->question_id = $questionId;
        $answer->save();

        return \Response::json([
        	'result' => 'Saved'
        ], 200);

    }    
}
