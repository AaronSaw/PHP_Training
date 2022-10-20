<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Api\StudentApiServiceInterface;
use App\Models\Student;
use App\Services\Student\StudentApiService;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{

    private $studentApiInterface;

    public function __construct(StudentApiServiceInterface $studentApiServiceInterface)
    {
        $this->studentApiInterface = $studentApiServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $students = $this->studentApiInterface->apiIndex();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "age"=>"required",
            "major_id"=>"required"
        ]);
    $this->studentApiInterface->apiStore($request);
    return response()->json(['message'=>"Student is created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = $this->studentApiInterface->apiShow($id);
        //$students=Student::find($id);
        //if(is_null($students)){
        //    return response()->json(["message"=>"Student is not found"],404);
        //}
        return $students;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>"nullable|min:3",
            "age"=>"nullable|numeric",
        ]);
        $this->studentApiInterface->apiupdate($request,$id);
        return response()->json(['message'=>"Student is updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentApiInterface->apidelete($id);
        return response()->json(['message'=>'Student is deleted'],204);
    }
}
