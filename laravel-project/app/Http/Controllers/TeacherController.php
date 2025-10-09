<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacher() {
        $teachers = Teacher::all();

        return view('teacher', [
            'title' => 'Teacher Page',
            'teachers' => $teachers
        ]);
    }
}
