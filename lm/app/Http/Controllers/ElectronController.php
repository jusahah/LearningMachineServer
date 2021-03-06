<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewTextItemRequest;
use App\Http\Requests\NewImageItemRequest;

use App\Category;
use App\Tag;
use App\TextItem;
use App\ImageItem;

class ElectronController extends Controller
{
    //
	// All methods get request which has User saved as 'user' attribute!

    public function getMetaData(Request $request) {

    	$user = \Auth::user();

    	$categories = Category::where('user_id', $user->id)->get();
    	$tags = Tag::where('user_id', $user->id)->get();

    	return \Response::json([
    		'categories' => Category::parseTree($categories, null),
    		'tags' => $tags,
            's3BaseUrl' => env('S3_BASE_URL')
    	], 200);

    } 

    public function getS3Key(Request $request) {

    	// We just whip up new S3 key for file saving
    	return \Response::json([
    		's3key' => (string) \Uuid::generate()
    	], 200);
    }

    public function createNewTextItem(NewTextItemRequest $request) {

    	$fields = $request->all();
    	$fields['user_id'] = \Auth::id();

    	TextItem::createItem($fields);

    	return \Response::json([
    		'result' => 'Item created'
    	], 200);
    }

    public function newImageItem(NewImageItemRequest $request) {

    	$fields = $request->all();
    	$fields['user_id'] = \Auth::id();

    	ImageItem::createItem($fields);

    	return \Response::json([
    		'result' => 'Item created'
    	], 200);
    }
}
