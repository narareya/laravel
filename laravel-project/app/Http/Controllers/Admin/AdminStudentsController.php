<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        $classrooms = Classroom::all();

        return view('admin.students.index', [
            'title' => 'Students',
            'students' => $students,
            'classrooms' => $classrooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();

        return view('admin.students.create', [
            'classrooms' => $classrooms,
            'students' => Student::paginate(5)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'birthday' => 'required|date',
            'classroom_id' => 'required|exists:classrooms,id',
            'gender' => 'required|string',
            'address' => 'nullable|string',
        ]);
    
        Student::create($validated); // simpan ke database
        
        return redirect()->route('admin.students.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = Student::findOrFail($id);
        return view('admin.students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'birthday' => 'required|date',
            'classroom_id' => 'required|exists:classrooms,id',
            'gender' => 'required|string',
            'address' => 'nullable|string',
        ]);
    
        $students = Student::findOrFail($id);
        $students->update($validated);
    
        return redirect()->route('admin.students.index')
                         ->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Data berhasil dihapus !');
    }
}
