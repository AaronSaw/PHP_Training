<?php

namespace App\Dao\Blog;

use App\Models\Blog;
use App\Contracts\Dao\Blog\BlogDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for blog
 */
class BlogDao implements BlogDaoInterface
{
    /**
     * To get $blogs
     * @return array $blogs
     */
    public function getIndex()
    {
        $blogs = Blog::all();
        return $blogs;
    }

    /**
     * To store $blog data
     * @param Request $request request with inputs
     * @return store $blog data
     */
    public function getStore( $request)
    {
        Blog::create([
            "title" => $request->title,
            "description" => $request->description
        ]);
    }
    /** To delete $blog data
      * @param Blog $blog
     * @return delete $blog data
     */
    public function getDelete($blog)
    {
        $blog->delete();
    }
 /**
   * @param Request $request request with inputs
   * @param Blog $blog
   * To updata $blog data
   * @return update $blog data
   */
    public function getUpdate($request, $blog)
    {
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->update();
    }
}
