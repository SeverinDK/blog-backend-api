<?php

namespace App\Http\Controllers;

use App\Blog\Blog;
use App\Blog\BlogRepository;
use App\Blog\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @var BlogService
     */
    private $blogService;
    /**
     * @var BlogRepository
     */
    private $blogRepository;

    /**
     * BlogController constructor.
     * @param BlogService $blogService
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogService $blogService, BlogRepository $blogRepository)
    {

        $this->blogService = $blogService;
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->all();

        return response()->json($blogs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->blogRepository->get($id);

        return response()->json($blog);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $blog = $this->blogService->createForAuthorizedUser($request['name']);

        return response()->json($blog);
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $blog = $this->blogService->update($id, $request['field'], $request['value']);

        return response()->json($blog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = $this->blogRepository->delete($id);

        return response()->json($blog);
    }
}
