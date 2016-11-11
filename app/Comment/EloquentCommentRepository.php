<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:13
 */

namespace App\Comment;


class EloquentCommentRepository implements CommentRepository
{

    /**
     * @return mixed
     */
    public function all()
    {
        return Comment::all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return Comment::find($id);
    }

    /**
     * @param Comment $comment
     * @return mixed
     */
    public function save(Comment $comment)
    {
        if($comment->save()) {
            return $comment;
        }

        return false;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $comment = Comment::find($id);
        if($comment) {
            return $comment->delete();
        }

        return false;
    }
}