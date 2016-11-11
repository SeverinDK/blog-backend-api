<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:08
 */

namespace App\Blog;


use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $app = $this->app;

        $app->bind(BlogRepository::class, EloquentBlogRepository::class);
    }
}