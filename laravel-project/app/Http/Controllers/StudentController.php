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

// one to many
// public function students() {
//     return $this->hasMany(Student::class, 'classroom_id');
// }

// public function classroom() {
//     return $this->belongsTo(Classroom::class, 'classroom_id');
// }

// // ambil semua siswa di kelas A
// $classroom = Classroom::find(1);
// $students = $classroom->students;

// // ambil kelas dari seorang siswa
// $student = Student::find(5);
// $class = $student->classroom;



// one to one
// public function profile() {
//     return $this->hasOne(Profile::class);
// }

// public function student() {
//     return $this->belongsTo(Student::class);
// }

// $student = Student::find(1);
// $profile = $student->profile;

// $profile = Profile::find(1);
// $student = $profile->student;



// many to many
// contoh L Student.php
// public function clubs() {
//     return $this->belongsToMany(Club::class, 'club_student', 'student_id', 'club_id');
// }

// contoh : Club.php
// public function students() {
//     return $this->belongsToMany(Student::class, 'club_student', 'club_id', 'student_id');
// }

// controller
// $student = Student::find(1);
// $student->clubs; // semua club yang diikutin

// $club = Club::find(2);
// $club->students; // semua siswa yang ikut club itu

// // nambahin hubungan baru
// $student->clubs()->attach(2);
