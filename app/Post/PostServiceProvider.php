<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:16
 */

namespace App\Post;


use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    public function register()
    {
        $app = $this->app;

        $app->bind(PostRepository::class, EloquentPostRepository::class);
    }
}