<?php

namespace App\Http\Controllers;

use App\Models\Second;
use App\Http\Requests\StoreSecondRequest;
use App\Http\Requests\UpdateSecondRequest;

class SecondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSecondRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSecondRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Second  $second
     * @return \Illuminate\Http\Response
     */
    public function show(Second $second)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Second  $second
     * @return \Illuminate\Http\Response
     */
    public function edit(Second $second)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSecondRequest  $request
     * @param  \App\Models\Second  $second
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSecondRequest $request, Second $second)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Second  $second
     * @return \Illuminate\Http\Response
     */
    public function destroy(Second $second)
    {
        //
    }
}
