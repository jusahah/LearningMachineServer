<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiKeyController extends Controller
{
    //

    public function generateApiKey(Request $request) {

    	$newKey = (string) \Uuid::generate(4);

    	$user = \Auth::user();
    	$user->apikey = $newKey;
    	$user->save();

    	return \Response::json([
    		'apikey' => $newKey
    	], 200);
    }
}
