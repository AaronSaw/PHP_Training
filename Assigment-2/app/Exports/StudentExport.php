<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Major;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::all();
    }

    //custom header
    public function headings(): array
    {
        return [
            '#',
            'name',
            'age',
            'major_id',
            'created_at',
        ];
    }
}
