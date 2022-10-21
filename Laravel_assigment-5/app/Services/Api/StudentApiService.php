<?php

namespace App\Services\Api;

use App\Contracts\Dao\Api\StudentApiDaoInterface;
use App\Models\Student;
use App\Contracts\Services\Api\StudentApiServiceInterface;
use Illuminate\Http\Request;

class StudentApiService implements StudentApiServiceInterface
{
    private $apiDao;
    public function __construct(StudentApiDaoInterface $apiDao)
    {
        $this->apiDao = $apiDao;
    }

    /**
     * To get student list
     * @return array $students list
     */
    public function apiIndex()
    {
        return $this->apiDao->apiIndex();
    }

    /**
     * To store $student Data
     * @param Request $request request with inputs
     * @return Store $student data
     */
    public function apiStore(Request $request)
    {
        return  $this->apiDao->apiStore($request);
    }
 /**
     * To store $student Data
     * @param Request $request request with inputs
     * @return Store $student data
     */
    public function apiShow($id)
    {
        return  $this->apiDao->apiShow($id);
    }
    /**
     * To Delete data
     * @param student $student
     * @return Delete $student data
     */
    public function apiDelete($id)
    {
        return $this->apiDao->apiDelete($id);
    }

    /**
     * To Update $student data
     * @param Request $request request with inputs
     * @param student $student
     * @return updata $student data
     */
    public function apiUpdate(Request $request,$id)
    {
        return $this->apiDao->apiUpdate($request, $id);
    }
}
