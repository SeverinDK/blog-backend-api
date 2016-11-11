<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:06
 */

namespace App\Blog;


interface BlogRepository
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
     * @param Blog $blog
     * @return mixed
     */
    public function save(Blog $blog);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}