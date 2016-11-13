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

        if($posts) {
            return response()->json($posts, 200);
        }

        return response()->json([], 404);
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

        if($post) {
            return response()->json($post, 200);
        }

        return response()->json([], 404);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getComments($id)
    {
        $post = $this->postRepository->get($id);

        if($post) {
            return response()->json($post->comments, 200);
        }

        return response()->json([], 404);
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

        if($post) {
            return response()->json($post, 200);
        }

        return response()->json([], 404);
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

        if($post) {
            return response()->json($post, 200);
        }

        return response()->json([], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if($this->postService->delete($id)) {
            return response()->json(200);
        }

        return response()->json([], 404);
    }
}
