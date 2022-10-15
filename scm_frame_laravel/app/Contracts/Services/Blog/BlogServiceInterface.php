<?php

namespace App\Contracts\Services\Blog;

use App\Models\Blog;
use Illuminate\Http\Request;

/**
 * Interface for blog service
 */
interface BlogServiceInterface
{
    /**
     * To get Blogs list
     * @return array $blogs
     */
    public function getIndex();

    /**
     * To store $blog data
     * @param Request $request request with inputs
     * @return  Store $blog data
     */
    public function getStore(Request $request);

    /**
     * To delete $blog data
     * @param Blog $blog
     * @return   delete $blog data
     */
    public function getDelete(Blog $blod);
    
    /**
     * To update $blog data
     * @param Request $request request with inputs
     * @param Blog $blog
     * @return Update $blog data
     */
    public function getUpdate(Request $request, Blog $blog);
}
