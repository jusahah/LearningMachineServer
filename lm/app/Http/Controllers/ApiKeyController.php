<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use DB;

class ApiKeyController extends Controller
{
    //
	/*
    public function generateApiKey(Request $request) {

    	$newKey = (string) \Uuid::generate(4);

    	$user = \Auth::user();
    	$user->apikey = $newKey;
    	$user->save();

    	return \Response::json([
    		'apikey' => $newKey
    	], 200);
    }
    */

    public function generateApiKey(Request $request) {

    	// Purge old keys
    	\DB::table('api_keys')->where('user_id', \Auth::id())->delete();

    	$apiKey = \Chrisbjr\ApiGuard\Models\ApiKey::make(\Auth::id());
    	return \Response::json([
    		'apikey' => $apiKey->key
    	], 200);
    }

    public function doesKeyExist(Request $request, $apiKey) {
        // JSON route

        if (\DB::table('api_keys')->where('key', $apiKey)->exists()) {
            $result = 1;
        } else {
            $result = 0;
        }

        return \Response::json([
            'result' => $result
        ], 200);

    }
}
