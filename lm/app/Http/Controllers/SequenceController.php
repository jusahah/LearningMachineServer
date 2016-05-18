<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Sequence;

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
        $sequences = $this->user->getSequences();

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
    public function store(Request $request)
    {
        //
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
        return view('sequences.single', compact('sequence', 'sequenceables'));
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
    public function destroy($id)
    {
        dd("Delete: " . $id);
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
}
