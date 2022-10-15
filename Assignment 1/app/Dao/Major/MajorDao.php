<?php

namespace App\Dao\Major;

use App\Models\Major;
use App\Contracts\Dao\Major\MajorDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for major
 */
class MajorDao implements MajorDaoInterface
{
    /**
     * To get $majors
     * @return array $majors
     */
    public function getIndex()
    {
        $majors = Major::all();
        return $majors;
    }

    /**
     * To store $major data
     * @param Request $request request with inputs
     * @return store $major data
     */
    public function getStore($request)
    {
        $major = new Major();
        $major->major = $request->major;
        $major->save();
    }

    /** To delete $major data
     * @param major $major
     * @return delete $major data
     */
    public function getDelete($major)
    {
        $major->delete();
    }
    
    /**
     * @param Request $request request with inputs
     * @param major $major
     * To updata $major data
     * @return update $major data
     */
    public function getUpdate($request, $major)
    {
        $major->major = $request->major;
        $major->update();
    }
}
