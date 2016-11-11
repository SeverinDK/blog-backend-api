<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:14
 */

namespace App\Post;

interface PostRepository
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id);

    /**
     * @param Post $post
     * @return mixed
     */
    public function save(Post $post);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}