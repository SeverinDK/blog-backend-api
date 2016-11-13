<?php
/**
 * Created by PhpStorm.
 * User: Laravel
 * Date: 12-11-2016
 * Time: 17:22
 */

namespace App\Blog;


class BlogObserver
{
    public function deleting(Blog $blog)
    {
        $posts = $blog->posts;

        foreach($posts as $post) {
            $post->delete();
        }
    }
}