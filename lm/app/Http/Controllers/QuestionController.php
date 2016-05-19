<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewQuestionRequest;

use App\Question; 
use App\Item;



class QuestionController extends Controller
{
    /*
    public function showQuestionsForItem(Item $item) {

        $questions = $item->questions()->paginate(15);

        return view('questions.list', compact('questions'));
    }
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = \Auth::user()->getQuestions(); // Comes with pagination
        
        return view('questions.list', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewQuestionRequest $request)
    {
        // Note!
        // We should seriously consider moving this into use-case
        // or into User class where we can associate it automatically to user

        // Already validated in request object
        // Also already checked that user owns the item this question is about to be bound
        Question::create([
            'item_id' => $request->get('item_id'),
            'user_id' => \Auth::id(),
            'name' => $request->get('name'),
            'question' => $request->get('question'),
            'answer' => $request->get('answer')
        ]);

        \Session::flash('success', 'Question created!');
        return redirect()->back();        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.single', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        // Onwership has been confirmed in middleware
        $question->delete();
        \Session::flash('success', 'Question was deleted');
        return redirect()->back(); 
    }


}
