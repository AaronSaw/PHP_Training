<?php

namespace App\Services\Blog;

use App\Models\Blog;
use App\Contracts\Dao\Blog\BlogDaoInterface;
use App\Contracts\Services\Blog\BlogServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for blog.
 */
class BlogService implements BlogServiceInterface
{
    /**
     * blog dao
     */
    private $blogDao;
    /**
     * Class Constructor
     * @param BlogDaoInterface
     * @return
     */
    public function __construct(BlogDaoInterface $blogDao)
    {
        $this->blogDao = $blogDao;
    }

    /**
     * To get blog list
     * @return array $blogs list
     */
    public function getIndex()
    {
        return $this->blogDao->getIndex();
    }

    /**
     * To store $Blog Data
     * @param Request $request request with inputs
     * @return Store $blog data
     */
    public function getStore(Request $request)
    {
        return  $this->blogDao->getStore($request);
    }

    /**
     * To Delete data
     * @param Blog $blog
     * @return Delete $blog data
     */
    public function getDelete(Blog $blog)
    {
        return $this->blogDao->getDelete($blog);
    }
    
    /**
     * To Update $blog data
     * @param Request $request request with inputs
     * @param Blog $blog
     * @return updata $blog data
     */
    public function getUpdate(Request $request, Blog $blog)
    {
        return $this->blogDao->getUpdate($request, $blog);
    }
}
