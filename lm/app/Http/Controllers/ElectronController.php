<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Tag;

class ElectronController extends Controller
{
    //
	// All methods get request which has User saved as 'user' attribute!

    public function getMetaData(Request $request) {

    	$user = $request->get('user');

    	$categories = Category::where('user_id', $user->id)->get();
    	$tags = Tag::where('user_id', $user->id)->get();

    	return \Response::json([
    		'categories' => $categories,
    		'tags' => $tags
    	], 200);

    } 
}
