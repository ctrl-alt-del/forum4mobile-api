<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
* Put all the routes into a group 'api/v1'
*
* @since 2014-05-08
* @version 1.0
**/
Route::group(
	array(
		'prefix'    => 'api/v1',
        'before'    => '', // filter used before calling routes
        'after'     => '', // filter used after calling routes
        ),

	function() {

		Route::get('/', function() {
			return 'Welcome to <b>forum4mobile-api</b> demo version 01';
		});

		Route::resource('users', 'UsersController');
        // Route::post('users/register', array('uses' => 'UsersController@store'));
        // Route::post('users/login', array('uses' => 'UsersController@doLogin')); // create a new user
        // Route::get('users/logout', array('uses' => 'UsersController@doLogout'));
        // Route::get('users/{id}', array('before' => 'auth.users', 'uses' => 'UsersController@show'));

		Route::resource('topics', 'TopicsController');
		Route::resource('concerns', 'ConcernsController');
		Route::resource('reviews', 'ReviewsController');
		Route::resource('votes', 'VotesController');
	});

/**
* Redirect all the routes to 'api/v1'
*
* @since 2014-05-08
* @version 2.0
**/
Route::any('{all}', function($path) {
	if (!preg_match("/\bapi\/v1\b/i", $path)) {
		return Redirect::to('api/v1/'.$path);
	}
})->where('all', '.*');