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

        return response()->json([$blogs]);
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

        return response()->json([$blog]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $name
     * @return \Illuminate\Http\Response
     */
    public function store(string $name)
    {
        $blog = $this->blogService->createForAuthorizedUser($name);

        return response()->json([$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param $field
     * @param $value
     * @return \Illuminate\Http\Response
     */
    public function update($id, $field, $value)
    {
        $blog = $this->blogService->update($id, $field, $value);

        return response()->json([$blog]);
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

        return response()->json([$blog]);
    }
}
