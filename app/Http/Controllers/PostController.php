<?php

namespace App\Http\Controllers;

use App\Blog\BlogRepository;
use App\Post\PostRepository;
use App\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var BlogService
     */
    private $blogService;
    /**
     * @var BlogRepository
     */
    private $blogRepository;

    /**
     * PostController constructor.
     * @param PostService $postService
     * @param PostRepository $postRepository
     * @param BlogRepository $blogRepository
     */
    public function __construct(PostService $postService, PostRepository $postRepository, BlogRepository $blogRepository)
    {

        $this->postService = $postService;
        $this->postRepository = $postRepository;
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->all();

        return response()->json($posts);
    }

    public function getBlogPosts(int $id)
    {
        $posts = $this->blogRepository->get($id)->posts;

        return response()->json($posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postRepository->get($id);

        return response()->json($post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $post = $this->postService->createPostForBlog($id, $request['title'], $request['content']);

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $post = $this->postService->update($id, $request['field'], $request['value']);

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $post = $this->postRepository->delete($id);

        return response()->json($post);
    }
}
