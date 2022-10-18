<?php

namespace App\Contracts\Services\Student;

use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Interface for student service
 */
interface StudentServiceInterface
{
        /**
   * To get students list
   * @return array $students
   */
  public function getIndex();

  /**
* To store $student data
* @param Request $request request with inputs
* @return  Store $student data
*/
public function getStore(Request $request);

  /**
* To delete $student data
* @param student $student
* @return   delete $student data
*/
public function getDelete(Student $student);

    /**
* To update $student data
* @param Request $request request with inputs
* @param student $student
* @return Update $student data
*/
public function getUpdate(Request $request,Student $student);
}
