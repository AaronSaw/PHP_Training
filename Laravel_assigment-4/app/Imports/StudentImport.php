<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Major;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Ramsey\Uuid\Type\Integer;

class StudentImport implements ToModel , WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row,$id=0)
    {
        $major_name= $row['major'];
        return new Student([
            'id'   => $id,
            'name'    => $row['name'],
            'age' => $row['age'],
            'major_id' =>Major::Where('major','=',"$major_name")->first()->id,
            'created_at' => date('Y-m-d'),
        ]);
        $id++;
    }
}
