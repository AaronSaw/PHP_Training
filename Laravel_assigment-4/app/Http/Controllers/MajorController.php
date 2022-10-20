<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Contracts\Services\Major\MajorServiceInterface;
use App\Exports\UsersExport;
use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MajorController extends Controller
{
    private $majorInterface;

    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        $this->majorInterface = $majorServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = $this->majorInterface->getIndex();
        return  view('major.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('major.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMajorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMajorRequest $request)
    {
        $this->majorInterface->getStore($request);
        return redirect()->route('major.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        return view('major.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMajorRequest  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {
        $this->majorInterface->getUpdate($request, $major);
        return redirect()->route('major.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        $this->majorInterface->getDelete($major);
        return redirect()->route('major.index');
    }

    /**
     * export excel data.
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'invoices.xlsx');
    }

    /**
     * import excel data
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {

        Excel::import(new UsersImport, $request->major_file);
        return back();
    }
}
