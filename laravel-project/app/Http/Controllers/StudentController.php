<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student() {
        // $students = [
        //     [
        //         'no' => '1',
        //         'nama' => 'Esta',
        //         'email' => 'esta@gmail.com',
        //         'address' => 'Semarang',
        //     ],
        //     [
        //         'no' => '2',
        //         'nama' => 'Myra',
        //         'email' => 'myra@gmail.com',
        //         'address' => 'Kepri',
        //     ],
        //     [
        //         'no' => '3',
        //         'nama' => 'Dita',
        //         'email' => 'dita@gmail.com',
        //         'address' => 'Depok',
        //     ],
        //     [
        //         'no' => '4',
        //         'nama' => 'Sylvi',
        //         'email' => 'silvi@gmail.com',
        //         'address' => 'Kudus',
        //     ],
        //     [
        //         'no' => '5',
        //         'nama' => 'Lili',
        //         'email' => 'lili@gmail.com',
        //         'address' => 'Surabaya',
        //     ],
        // ];

        $students = Student::all();

        return view('student', [
            'title' => 'Student Page',
            'students' => $students
        ]);
    }
}
