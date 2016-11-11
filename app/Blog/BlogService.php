<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:08
 */

namespace App\Blog;


class BlogService
{
    /**
     * @var BlogRepository
     */
    private $blogRepository;

    /**
     * BlogService constructor.
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository)
    {

        $this->blogRepository = $blogRepository;
    }

    public function createForAuthorizedUser(string $name)
    {
        $blog = new Blog([
            'name' => $name,
            'user_id' => 1
        ]);

        return $this->blogRepository->save($blog);
    }

    public function update($id, $field, $value)
    {
        $blog = $this->blogRepository->get($id);
        if($blog[$field] != null) {
            $blog[$field] = $value;
            return $this->blogRepository->save($blog);
        }

        return false;
    }
}
