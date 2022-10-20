<?php

namespace App\Services\Major;

use App\Models\Major;
use App\Contracts\Services\Major\MajorServiceInterface;
use App\Contracts\Dao\Major\MajorDaoInterface;
use Illuminate\Http\Request;

class MajorService implements MajorServiceInterface
{
    private $majorDao;
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }

    /**
     * To get Major list
     * @return array $Majors list
     */
    public function getIndex()
    {
        return $this->majorDao->getIndex();
    }

    /**
     * To store $Major Data
     * @param Request $request request with inputs
     * @return Store $Major data
     */
    public function getStore(Request $request)
    {
        return  $this->majorDao->getStore($request);
    }

    /**
     * To Delete data
     * @param Major $Major
     * @return Delete $Major data
     */
    public function getDelete(Major $major)
    {
        return $this->majorDao->getDelete($major);
    }
    
    /**
     * To Update $Major data
     * @param Request $request request with inputs
     * @param Major $Major
     * @return updata $Major data
     */
    public function getUpdate(Request $request, Major $major)
    {
        return $this->majorDao->getUpdate($request, $major);
    }
}
