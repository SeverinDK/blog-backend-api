<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:18
 */

namespace App\Post;


class EloquentPostRepository implements PostRepository
{

    /**
     * @return mixed
     */
    public function all()
    {
        return Post::all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return Post::find($id);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function save(Post $post)
    {
        if($post->save()) {
            return $post;
        }

        return false;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        if(Post::find($id)->delete()) {
            return true;
        }

        return false;
    }
}