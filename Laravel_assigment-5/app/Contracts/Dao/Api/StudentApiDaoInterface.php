<?php

namespace App\Contracts\Dao\Api;

use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Blog
 */
interface StudentApiDaoInterface
{
       /**
   * To get $blogs
   * @return array $blogs
   */
  public function apiIndex();
  /**
  * To store $blog data
  * @param Request $request request with inputs
  * @return store $blog data
  */
 public function apiStore(Request $request);

 /**
  * To store $blog data
  * @param Request $request request with inputs
  * @return store $blog data
  */
  public function apiShow($id);

  /**
   *
  * To delete $blog data
  * @param Blog $blog
  * @return delete $blog data
  */
 public function apiDelete($id);
  /**
  * To updata $blog data
  * @param Request $request request with inputs
  * @param Blog $blog
  * @return updata $blog datta
  */
 public function apiUpdate(Request $request,$id);
}
