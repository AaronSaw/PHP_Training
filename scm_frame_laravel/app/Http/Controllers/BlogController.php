<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Contracts\Services\Blog\BlogServiceInterface;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;


class BlogController extends Controller
{
    /**
     *blog interface
     */
    private $blogInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BlogServiceInterface $blogServiceInterface)
    {
        $this->blogInterface = $blogServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return view(index)
     */
    public function index()
    {
        $blogs = $this->blogInterface->getIndex();
        return view('index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view('create)
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return route('blog.index')
     */
    public function store(StoreBlogRequest $request)
    {
        $this->blogInterface->getStore($request);
        return redirect()->route('blog.index')->with('status', 'Blog is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return view('edit)
     */
    public function edit(Blog $blog)
    {
        return view('edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return  route('blog.index')
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $this->blogInterface->getUpdate($request, $blog);
        return redirect()->route("blog.index")->with("status", "Blog is Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return route('blog.index')
     */
    public function destroy(Blog $blog)
    {
        $this->blogInterface->getDelete($blog);
        return redirect()->route('blog.index')->with("status", "Blog is deleted");
    }
}
