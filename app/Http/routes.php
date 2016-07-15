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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::auth();

//Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {  
    Route::get('/', 'HomeController@index');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {  
    Route::get('/', 'HomeController@index');
    Route::resource('article', 'ArticleController');
    Route::resource('comments', 'CommentsController');
    Route::resource('tags', 'TagsController');
});

Route::get('article/{id}', 'ArticleController@show');  

Route::post('search', 'ArticleController@search');  

Route::post('comment', 'CommentController@store');  