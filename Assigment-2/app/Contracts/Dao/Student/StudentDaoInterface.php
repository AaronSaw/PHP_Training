<?php

namespace App\Contracts\Dao\Student;

use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Blog
 */
interface StudentDaoInterface
{
       /**
   * To get $blogs
   * @return array $blogs
   */
  public function getIndex();
  /**
  * To store $blog data
  * @param Request $request request with inputs
  * @return store $blog data
  */
 public function getStore(Request $request);
  /**
  * To delete $blog data
  * @param Blog $blog
  * @return delete $blog data
  */
 public function getDelete(Student $student);
  /**
  * To updata $blog data
  * @param Request $request request with inputs
  * @param Blog $blog
  * @return updata $blog datta
  */
 public function getUpdate(Request $request,Student $student);
}
