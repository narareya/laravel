<?php

use App\Http\Controllers\Admin\AdminClassroomController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminGuardiansController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GuardiansController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\AdminStudentsController;
use App\Http\Controllers\admin\AdminSubjectsController;
use App\Http\Controllers\admin\AdminTeachersController;

Route::get('/', [ProfilController::class, 'index']);

Route::get('/profile', [ProfilController::class, 'profile'])->name('profile');

Route::get('/contact', [ProfilController::class, 'contact'])->name('contact');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/student', [StudentController::class, 'student'])->name('student');

Route::get('/guardian', [GuardiansController::class, 'guardian'])->name('guardian');

Route::get('/classroom', [ClassroomController::class, 'classroom'])->name('classroom');

Route::get('/subject', [SubjectController::class, 'subject'])->name('subject');

Route::get('/teacher', [TeacherController::class, 'teacher'])->name('teacher');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::resources([
        'students' => AdminStudentsController::class,
        'classroom' => AdminClassroomController::class,
        'teachers' => AdminTeachersController::class,
        'subjects' => AdminSubjectsController::class,
        'guardians' => AdminGuardiansController::class,
    ]);
});