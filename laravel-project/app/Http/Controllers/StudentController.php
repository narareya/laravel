<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student() {
        $students = Student::all();

        return view('student', [
            'title' => 'Student Page',
            'students' => $students
        ]);
    }
}
