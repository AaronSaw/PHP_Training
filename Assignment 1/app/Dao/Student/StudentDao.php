<?php

namespace App\Dao\Student;

use App\Models\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for student
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * To get $students
     * @return array $students
     */
    public function getIndex()
    {
        $students = Student::all();
        return $students;
    }

    /**
     * To store $student data
     * @param Request $request request with inputs
     * @return store $student data
     */
    public function getStore($request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->major_id = $request->major;
        $student->save();
    }

    /** To delete $student data
     * @param student $student
     * @return delete $student data
     */
    public function getDelete($student)
    {
        $student->delete();
    }
    
    /**
     * @param Request $request request with inputs
     * @param student $student
     * To updata $student data
     * @return update $student data
     */
    public function getUpdate($request, $student)
    {
        $student->name = $request->name;
        $student->age = $request->age;
        $student->major_id = $request->major;
        $student->update();
    }
}
