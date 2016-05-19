<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewSequenceRequest;

use App\Sequence;
use App\Question;

class SequenceController extends Controller
{
    protected $user;

    public function __construct() {
        $this->user = \Auth::user();
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sequences = $this->user->getSequences(); // with pagination

        return view('sequences.list', compact('sequences'));
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
    public function store(NewSequenceRequest $request)
    {
        
        // Note!
        // We should seriously consider moving this into use-case
        // or into User class where we can associate it automatically to user

        // Already validated in request object
        Sequence::create([
            'user_id' => \Auth::id(),
            'name' => $request->get('name')
        ]);

        \Session::flash('success', 'Sequence created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sequence $sequence)
    {

        $sequenceables = $sequence->sequenceables->sortBy(function($s) {
            return $s->pivot->order;
        });
        $allSequenceables = \Auth::user()->getSequenceables()->sortBy(function($s) {
            return $s->sequenceable_type;
        });
        return view('sequences.single', compact(
            'sequence', 
            'sequenceables', 
            'allSequenceables'
        ));
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
    public function destroy(Sequence $sequence)
    {
        // Onwership has been confirmed in middleware
        $sequence->delete();
        \Session::flash('success', 'Sequence was deleted');
        return redirect()->back();        
    }

    public function reorder(Request $request, Sequence $sequence) {
        $orderArray = json_decode($request->get('order'));
        try {
            $sequence->saveNewOrder($orderArray);
        }catch(\Exception $e) {
            return \Response::json([
                'msg' => $e->getMessage(),
                'message' => 'Order could not be saved'
            ], 400);
        }

        return \Response::json([
            'message' => 'Order saved'
        ], 200);
        
    }

    public function showSequencesWhereQuestionPresent(Question $question) {
        $sequences = $question->sequenceable->sequences()->paginate(25);
        return view('sequences.list', compact('sequences'));
    }
}
