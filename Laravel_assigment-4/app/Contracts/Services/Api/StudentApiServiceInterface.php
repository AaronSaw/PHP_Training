<?php

namespace App\Contracts\Services\Api;

use App\Models\Student;
use Illuminate\Http\Request;

/**
 * Interface for student service
 */
interface StudentApiServiceInterface
{

  public function apiIndex();

  /**
* To store $student data
* @param Request $request request with inputs
* @return  Store $student data
*/
public function apiStore(Request $request);

/**
* To store $student data
* @param Request $request request with inputs
* @return  Store $student data
*/
public function apiShow( $id);

  /**
* To delete $student data
* @param student $student
* @return   delete $student data
*/
public function apiDelete($id);

    /**
* To update $student data
* @param Request $request request with inputs
* @param student $student
* @return Update $student data
*/
public function apiUpdate(Request $request, $id);


}
