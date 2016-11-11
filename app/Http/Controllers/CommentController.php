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

        return response()->json($comments);
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

        return response()->json($comment);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function storePostComment(Request $request, int $id) {
        $comment = $this->postService->createComment($id, $request['content']);

        return response()->json($comment);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCommentReply(Request $request, int $id) {
        $comment = $this->commentService->createCommentReply($id, $request['content']);

        return response()->json($comment);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $comment = $this->commentService->update($id, $request['field'], $request['value']);

        return response()->json($comment);
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

        return response()->json($comment);
    }
}
