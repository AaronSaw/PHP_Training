<?php
namespace App\Exports;

use App\Invoice;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentExport implements FromView
{
    public function view(): View
    {
        return view('student.export', [
            'invoices' => Student::all()
    ]);
    }
}
