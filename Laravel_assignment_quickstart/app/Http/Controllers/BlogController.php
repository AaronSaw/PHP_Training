<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view(index)
     */
    public function index()
    {
        $blogs = Blog::all();
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
        Blog::create([
            "title" => $request->title,
            "description" => $request->description
        ]);
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
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->update();
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
        $blog->delete();
        return redirect()->route('blog.index')->with("status", "Blog is deleted");
    }
}

