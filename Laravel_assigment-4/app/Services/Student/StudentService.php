<?php

namespace App\Services\Student;

use App\Models\Student;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;

class StudentService implements StudentServiceInterface
{
    private $studentDao;
    public function  __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * To get student list
     * @return array $students list
     */
    public function getIndex()
    {
        return $this->studentDao->getIndex();
    }

    /**
     * To store $student Data
     * @param Request $request request with inputs
     * @return Store $student data
     */
    public function getStore(Request $request)
    {
        return  $this->studentDao->getStore($request);
    }

    /**
     * To Delete data
     * @param student $student
     * @return Delete $student data
     */
    public function getDelete(Student $student)
    {
        return $this->studentDao->getDelete($student);
    }

    /**
     * To Update $student data
     * @param Request $request request with inputs
     * @param student $student
     * @return updata $student data
     */
    public function getUpdate(Request $request, Student $student)
    {
        return $this->studentDao->getUpdate($request, $student);
    }
}
