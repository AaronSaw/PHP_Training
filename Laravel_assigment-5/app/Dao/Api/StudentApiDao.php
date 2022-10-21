<?php

namespace App\Dao\Api;

use App\Contracts\Dao\Api\StudentApiDaoInterface;
use App\Models\Student;
use App\Contracts\Dao\Api\StudentDaoInterface;
use Illuminate\Http\Request;


/**
 * Data accessing object for student
 */
class StudentApiDao implements  StudentApiDaoInterface
{
    /**
     * To get $students
     * @return array $students
     */
    public function apiIndex()
    {
        //search query
    $students=Student::all();
     return $students;
    }

    /**
     * To store $student data
     * @param Request $request request with inputs
     * @return store $student data
     */
    public function apiStore($request)
    {
        Student::create([
            "name"=>$request->name,
            "age"=>$request->age,
            "major_id"=>$request->major_id,
        ]);
    }

    public function apiShow($id)
    {
        //search query
    $students=Student::find($id);
        if(is_null($students)){
            return response()->json(["message"=>"Student is not found"],404);
        }
     return $students;
    }

    /** To delete $student data
     * @param student $student
     * @return delete $student data
     */
    public function apiDelete($id)
    {
        $students=Student::find($id);
        if(is_null($students)){
            return response()->json(["message"=>"Student is not found"],404);
        }
        $students->delete();
    }

    /**
     * @param Request $request request with inputs
     * @param student $student
     * To updata $student data
     * @return update $student data
     */
    public function apiUpdate($request, $id)
    {
        $students=Student::find($id);
        if(is_null($students)){
            return response()->json(["message"=>"Student is not found"],404);
        }
        //return $request;
        if($request->has('name')){
           $students->name=$request->name;
        }
        if($request->has('age')){
         $students->age=$request->age;
        }
       if($request->has('major_id')){
         $students->major_id=$request->major_id;
       }
        $students->update();
    }
}
