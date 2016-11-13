<?php
/**
 * Created by PhpStorm.
 * User: Laravel
 * Date: 12-11-2016
 * Time: 17:30
 */

namespace App\Post;


class PostObserver
{
    public function deleting(Post $post)
    {
        $comments = $post->comments;

        foreach($comments as $comment) {
            $comment->delete();
        }
    }
}