<?php

namespace App\Providers;

use App\Blog\Blog;
use App\Blog\BlogObserver;
use App\Comment\Comment;
use App\Comment\CommentObserver;
use App\Post\Post;
use App\Post\PostObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blog::observe(BlogObserver::class);
        Post::observe(PostObserver::class);
        Comment::observe(CommentObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
