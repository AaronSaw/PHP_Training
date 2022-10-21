<?php

namespace App\Http\Controllers;

use App\Mail\StudentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(){
        Mail::to('sawkyaw7777777@gmail.com')
        ->send(new StudentMail());
        return redirect()->route('student.index')->with('status',"check gmail");
    }
}
