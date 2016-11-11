<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:12
 */

namespace App\Comment;


use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $app = $this->app;

        $app->bind(CommentRepository::class, EloquentCommentRepository::class);
    }
}