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





Route::group(['prefix' => 'electron/{apiKey}', 'middleware' => ['checkApiKey']], function() {
	// Middleware has bound user info to request
	Route::get('s3key',    ['uses' => 'ElectronController@getS3Key']);
	Route::get('metadata', ['uses' => 'ElectronController@getMetaData']);
	Route::post('text', ['uses' => 'ElectronController@newTextItem']);
	Route::post('image', ['uses' => 'ElectronController@newImageItem']);

});


Route::group(['middleware' => 'web'], function() {

	Route::auth();
	
	Route::group(['middleware' => 'auth'], function() {
		Route::get('/home', 'HomeController@index');

		Route::get('/', function () {
		    return view('layouts/main');
		});
		// AJAX route
		Route::get('apikey/create', [
			'as' => 'apikey.create',
			'uses' => 'ApiKeyController@generateApiKey'
		]);

		Route::resource('item', 'ItemController');
		Route::get('item/{item}/questions', [
			'as' => 'item.question.list',
			'uses' => 'QuestionController@showQuestionsForItem'
		]);

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
		Route::get('sequence/{sequence}/play', [
			'as' => 'sequence.play',
			'uses' => 'PlayController@playSequence'
		]);

		// Question routes
		Route::resource('question', 'QuestionController');
		Route::get('question/{question}/delete', [
			'as' => 'question.customdelete',
			'uses' => 'QuestionController@destroy',
			'middleware' => 'ownerOfQuestion'
		]);	
		Route::get('question/{question}/sequences', [
			'as' => 'question.sequences.list',
			'uses' => 'SequenceController@showSequencesWhereQuestionPresent'
		]);

		// AJAX routes
		// Add somekind of middleware checking request is ajax...
		Route::group(['prefix' => 'json'], function() {
			Route::post('receiveanswerwithresult', [
				'as' => 'play.receiveanswerwithresult',
				'uses' => 'PlayController@receiveJSONAnswerWithResult'
			]);
		});
	});


});

Route::group(['prefix' => 'opendata'], function() {
	Route::group(['middleware' => 'checkUserIdForOpenDataRequest', 'prefix' => 'user/{user}'], function() {
		Route::get('timeline', 'OpenDataController@userTimeline');
	});
});

