<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();




Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index');

	Route::get('/', function () {
	    return view('layouts/main');
	});

	Route::resource('item', 'ItemController');
	// This route is called from javascript
	Route::get('item/{item}/delete', ['as' => 'item.customdelete', 'uses' => 'ItemController@destroy']);

	// Item owned resources
	Route::resource('item.questions', 'ItemQuestionController');

	Route::resource('category', 'CategoryController');
	Route::resource('tag', 'TagController');

	// Sequence routes
	Route::resource('sequence', 'SequenceController');
	Route::get('sequence/{sequence}/delete', [
		'as' => 'sequence.customdelete',
		'uses' => 'SequenceController@destroy',
		'middleware' => 'ownerOfSequence'
	]);
	Route::post('sequence/{sequence}/reorder', [
		'as' => 'sequence.reorder', 
		'uses' => 'SequenceController@reorder',
		'middleware' => 'ownerOfSequence'
	]);

	// Question routes
	Route::resource('question', 'QuestionController');
	Route::get('question/{question}/delete', [
		'as' => 'question.customdelete',
		'uses' => 'QuestionController@destroy',
		'middleware' => 'ownerOfQuestion'
	]);	
});

Route::group(['prefix' => 'opendata'], function() {

	Route::group(['middleware' => 'checkUserIdForOpenDataRequest', 'prefix' => 'user/{user}'], function() {
		Route::get('timeline', 'OpenDataController@userTimeline');
	});
});

