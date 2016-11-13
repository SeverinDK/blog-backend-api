<?php
/**
 * Created by PhpStorm.
 * User: Laravel
 * Date: 12-11-2016
 * Time: 17:29
 */

namespace App\Comment;


class CommentObserver
{
    public function deleting(Comment $comment)
    {
        $replies = $comment->comments;

        foreach($replies as $reply) {
            $reply->delete();
        }
    }
}