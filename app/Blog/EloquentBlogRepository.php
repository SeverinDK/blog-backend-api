<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:09
 */

namespace App\Blog;


class EloquentBlogRepository implements BlogRepository
{

    /**
     * @return mixed
     */
    public function all()
    {
        return Blog::all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return Blog::find($id);
    }

    /**
     * @param Blog $blog
     * @return mixed
     */
    public function save(Blog $blog)
    {
        if($blog->save()) {
            return $blog;
        }

        return false;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        if(Blog::find($id)->delete()) {
            return true;
        }

        return false;
    }
}