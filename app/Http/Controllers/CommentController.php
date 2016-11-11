<?php

namespace App\Http\Controllers;

use App\Comment\CommentRepository;
use App\Comment\CommentService;
use App\Post\PostService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @var CommentService
     */
    private $commentService;
    /**
     * @var CommentRepository
     */
    private $commentRepository;
    /**
     * @var PostService
     */
    private $postService;

    /**
     * CommentController constructor.
     * @param CommentService $commentService
     * @param CommentRepository $commentRepository
     * @param PostService $postService
     */
    public function __construct(CommentService $commentService, CommentRepository $commentRepository, PostService $postService)
    {

        $this->commentService = $commentService;
        $this->commentRepository = $commentRepository;
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = $this->commentRepository->all();

        return response()->json([$comments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = $this->commentRepository->get($id);

        return response()->json([$comment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $type
     * @param string $content
     * @return \Illuminate\Http\Response
     */
    public function store(string $type, string $content)
    {
        $comment = $this->commentService->create($type, $content);

        return response()->json([$comment]);
    }

    public function storePostComment(int $id, string $content) {
        $comment = $this->postService->createComment($id, $content);

        return response()->json([$comment]);
    }

    public function storeCommentReply(int $id, string $content) {
        $comment = $this->commentService->createCommentReply($id, $content);

        return response()->json([$comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param $field
     * @param $value
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, string $field, $value)
    {
        $comment = $this->commentService->update($id, $field, $value);

        return response()->json([$comment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = $this->commentRepository->delete($id);

        return response()->json([$comment]);
    }
}
