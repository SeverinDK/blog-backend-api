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

        if($comments) {
            return response()->json($comments, 200);
        }

        return response()->json([], 400);
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

        if($comment) {
            return response()->json($comment, 200);
        }

        return response()->json([], 404);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getComments($id)
    {
        $comment = $this->commentRepository->get($id);

        if($comment) {
            return response()->json($comment->comments, 200);
        }

        return response()->json([], 404);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function storePostComment(Request $request, int $id) {
        $comment = $this->postService->createComment($id, $request['content']);

        if($comment) {
            return response()->json($comment, 200);
        }

        return response()->json([], 400);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCommentReply(Request $request, int $id) {
        $comment = $this->commentService->createCommentReply($id, $request['content']);

        if($comment) {
            return response()->json($comment, 200);
        }

        return response()->json([], 404);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $comment = $this->commentService->update($id, $request['field'], $request['value']);

        if($comment) {
            return response()->json($comment, 200);
        }

        return response()->json([], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->commentService->delete($id)) {
            return response()->json(200);
        }

        return response()->json([], 404);
    }
}
