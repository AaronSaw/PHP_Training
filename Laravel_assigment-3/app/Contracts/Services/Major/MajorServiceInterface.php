<?php

namespace App\Contracts\Services\Major;

use App\Models\Major;
use Illuminate\Http\Request;

/**
 * Interface for major service
 */
interface MajorServiceInterface
{
        /**
   * To get majors list
   * @return array $majors
   */
  public function getIndex();

  /**
* To store $major data
* @param Request $request request with inputs
* @return  Store $major data
*/
public function getStore(Request $request);

  /**
* To delete $major data
* @param major $major
* @return   delete $major data
*/
public function getDelete(Major $major);

    /**
* To update $major data
* @param Request $request request with inputs
* @param major $major
* @return Update $major data
*/
public function getUpdate(Request $request,Major $major);
}
