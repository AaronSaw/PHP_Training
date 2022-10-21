<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Mail\StudentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{

    private $studentInterface;

    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return $students and view
     */
    public function index()
    {
        $students = $this->studentInterface->getIndex();
        //return $students;
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view(student.create)
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return student.index page
     */
    public function store(StoreStudentRequest $request)
    {
        $this->studentInterface->getStore($request);
        return redirect()->route('mail')->with('status', "$request->name is create successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return     abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return student and view(student.edit)
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return student.index page
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $this->studentInterface->getUpdate($request, $student);
        return redirect()->route('mail')->with('status', "$request->name is updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return student.index
     */
    public function destroy(Student $student)
    {
        $this->studentInterface->getDelete($student);
        return redirect()->route('mail')->with('status', "$student->name is deleted ");
    }

    /**
     * import  database
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }

    /**
     * import excel data
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $ufile = $request->file('student_file')->extension();
        $newName = uniqid() . "saw." . $ufile;
        $request->file('student_file')->storeAs("public", $newName);
        $fullPath = trim(storage_path() . "\app\public\ ") . $newName;
        $data = [
            'body' => $newName . 'is  here'
        ];
        Mail::send('student/file', $data, function ($message) use ($data, $fullPath) {
            $message->to('sawkyaw7777777@gmail.com')
                ->from('example@gmail.com')
                ->subject('File sending')
                ->attach($fullPath);
        });
        Excel::import(new StudentImport, $request->student_file);
        return redirect()->route('student.index')->with('status', "check gmail");
    }
}
