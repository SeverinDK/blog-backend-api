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
    // Get all blogs
    Route::get('/', 'BlogController@index');

    // Show a blog
    Route::get('/{id}', 'BlogController@show');

    // Store a new blog
    Route::post('/{name}', 'BlogController@store');

    // Update an existing blog
    Route::patch('/{id}/{field}/{value}', 'BlogController@update');

    // Delete a blog
    Route::delete('/{id}', 'BlogController@destroy');

    // Store new post in blog
    Route::post('/{id}/post', 'PostController@store');

    // Get all posts for blog
    Route::get('/{id}/posts', 'PostController@getBlogPosts');
});

Route::group(['prefix' => 'posts'], function()
{
    // Get all posts
    Route::get('/', 'PostController@index');

    // Show a post
    Route::get('/{id}', 'PostController@show');

    // Store comment for post
    Route::post('/{id}/comment/{content}', 'CommentController@storePostComment');

    // Update an existing blog
    Route::patch('/{id}/{field}/{value}', 'PostController@update');

    // Delete a blog
    Route::delete('/{id}', 'PostController@destroy');
});

Route::group(['prefix' => 'comments'], function()
{
    // Get all comments
    Route::get('/', 'CommentController@index');

    // Show a comment
    Route::get('/{id}', 'CommentController@show');

    // Store comment reply
    Route::post('/{id}/comment/{content}', 'CommentController@storeCommentReply');

    // Store comment
    Route::post('/{id}/{type}/{content}', 'CommentController@store');

    // Store a new blog
    Route::patch('/{id}/{field}/{value}', 'CommentController@update');

    // Delete a comment
    Route::delete('/{id}', 'CommentController@destroy');
});
