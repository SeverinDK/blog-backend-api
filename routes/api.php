<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'blogs'], function()
{
    Route::get('/', 'BlogController@index');
    Route::get('/{id}', 'BlogController@show');
    Route::get('/{id}/posts', 'BlogController@getPosts');
    Route::post('/', 'BlogController@store');
    Route::post('/{id}/post', 'PostController@store');
    Route::patch('/{id}', 'BlogController@update');
    Route::delete('/{id}', 'BlogController@destroy');
});

Route::group(['prefix' => 'posts'], function()
{
    Route::get('/', 'PostController@index');
    Route::get('/{id}', 'PostController@show');
    Route::get('/{id}/comments', 'PostController@getComments');
    Route::post('/{id}/comment', 'CommentController@storePostComment');
    Route::patch('/{id}', 'PostController@update');
    Route::delete('/{id}', 'PostController@destroy');
});

Route::group(['prefix' => 'comments'], function()
{
    Route::get('/', 'CommentController@index');
    Route::get('/{id}', 'CommentController@show');
    Route::get('/{id}/comments', 'CommentController@getComments');
    Route::post('/{id}/comment', 'CommentController@storeCommentReply');
    Route::patch('/{id}', 'CommentController@update');
    Route::delete('/{id}', 'CommentController@destroy');
});
