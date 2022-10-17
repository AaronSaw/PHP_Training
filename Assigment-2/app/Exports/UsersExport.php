<?php

namespace App\Exports;

use App\Models\Major;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Major::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'major',
            'created_at',
        ];
    }


}
