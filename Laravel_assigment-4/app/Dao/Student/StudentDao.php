<?php

namespace App\Dao\Student;

use App\Models\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //search query
        $students =
            DB::table('majors')->select(DB::raw('*'))
            ->leftJoin('students', 'students.major_id', '=', 'majors.id')
            ->when(request('name'), function ($q) {
                $name = request("name");
                $q->where("name", "like", "%$name%");
            })
            ->when(request('age'), function ($q) {
                $age = request("age");
                $q->where("age", "=", "$age");
            })
            ->when(request('sdate'), function ($p) {
                $sDate = request("sdate");
                $p->where("students.created_at", ">", "$sDate");
            })
            ->when(request('edate'), function ($e) {
                $eDate = request("edate");
                $e->where("students.created_at", "<", "$eDate");
            })
            ->when(request('major'), function ($e) {
                $major = request("major");
                $e->where("major", "like", "%$major%");
            })
            ->paginate(3);
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
