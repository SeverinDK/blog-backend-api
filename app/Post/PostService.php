<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 10-11-2016
 * Time: 19:15
 */

namespace App\Post;


use App\Blog\BlogRepository;
use App\Comment\Comment;

class PostService
{
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var BlogRepository
     */
    private $blogRepository;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     * @param BlogRepository $blogRepository
     */
    public function __construct(PostRepository $postRepository, BlogRepository $blogRepository)
    {
        $this->postRepository = $postRepository;
        $this->blogRepository = $blogRepository;
    }

    /**
     * @param $id
     * @param $title
     * @param $content
     * @return bool
     */
    public function createPostForBlog(int $id, string $title, string $content)
    {
        $blog = $this->blogRepository->get($id);
        if($blog) {
            $post = new Post([
                'title' => $title,
                'content' => $content,
                'user_id' => 1
            ]);

            return $blog->posts()->save($post);
        }

        return false;
    }

    /**
     * @param int $id
     * @param string $content
     * @return mixed
     */
    public function createComment(int $id, string $content)
    {
        $post = $this->postRepository->get($id);

        if($post) {
            return $post->comments()->create([
                'content' => $content,
                'user_id' => 1
            ]);
        }

        return false;
    }

    public function delete($id)
    {
        $post = $this->postRepository->get($id);

        if($post) {
            if($this->postRepository->delete($id)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $id
     * @param $field
     * @param $value
     * @return bool|mixed
     */
    public function update(int $id, string $field, string $value)
    {
        $post = $this->postRepository->get($id);
        if($post[$field] != null) {
            $post[$field] = $value;
            return $this->postRepository->save($post);
        }

        return false;
    }
}
