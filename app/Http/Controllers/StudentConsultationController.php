<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentConsultationController extends Controller
{
    public function pickConsultation()
    {
        return view('student.StudentPickConsultation');
    }
}

