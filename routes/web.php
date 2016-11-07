<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*

*/

Route::group(['$middleware' => 'web'], function() {
	Route::get('/', [
		'uses' => 'UserController@getWelcome',
		'as' => 'welcome'
		]);
	Route::post('/signup', [
		'uses' => 'UserController@postSignUp',
		'as' => 'signUp'
		]);
	Route::post('/signin', [
		'uses' => 'UserController@postSignIn',
		'as' => 'signin'
		]);
	Route::get('/dashboard', [
		'uses' => 'PostController@getDashboard',
		'as' => 'dashboard',
		'middleware' => 'auth'
		]);
	Route::post('/create_post', [
		'uses' => 'PostController@postCreatePost',
		'as' => 'post.create',
		'middleware' => 'auth'
		]);
	Route::get('/delete_post/{post_id}',[
		'uses' => 'PostController@getDeletePost',
		'as' => 'post.delete',
		'middleware' => 'auth'
		]);
	Route::get('/logout', [
		'uses' => 'UserController@getLogout',
		'as' => 'user.logout'
		]);
	Route::post('/edit', [
		'uses' => 'PostController@postEditPost',
		'as' => 'post.edit'
		]);

	Route::get('/profile', [
		'uses' => 'UserController@getProfile',
		'as' => 'user.profile'
		]);
	Route::post('/profile', [
		'uses' => 'UserController@updateAvatar',
		'as' => 'user.profile'
		]);
	Route::post('/like', [
		'uses' => 'PostController@postLikePost',
		'as' => 'post.like'
		]);
	/*Route::post('/update_account', [
		'uses' => 'UserController@postUpdateAccount',
		'as' => 'account.save'
		]);
		*/

});
