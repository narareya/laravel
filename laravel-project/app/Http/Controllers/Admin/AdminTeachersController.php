<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminTeachersController extends Controller
{
   
    public function index()
    {
        //mengambil data teacher serta subject dalam 1 query
        $teachers = Teacher::with('subject')->paginate(10);
        $subjects = Subject::all();

        return view('admin.teachers.index', [
            'title' => 'Teachers',
            'teachers' => $teachers,
            'subjects' => $subjects,
        ]);
    }

    
    public function create()
    {
        // ngambil subject yang belum dimiliki teacher/yang kosong (One-to-One)
        $subjects = Subject::doesntHave('teacher')->get();

        // tidak ngirim data yg tdk dpkai
        return view('admin.teachers.create', [
            'title' => 'Create Teacher',
            'subjects' => $subjects,
        ]);
    }

    
    public function store(Request $request)
    {
        $messages = [
            'subject_id.unique' => 'This subject has already been assigned to another teacher. Please select a different subject.',
        ];

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id|unique:teachers,subject_id',
            'email'      => 'required|email|unique:teachers,email',
            'phone'      => 'required|string|max:20',
            'address'    => 'nullable|string',
        ], $messages);

        Teacher::create($validated);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher created successfully!');
    }

   
    public function show(string $id)
    {
        $teacher = Teacher::with('subject')->findOrFail($id);

        return view('admin.teachers.show', [
            'title' => 'Teacher Details',
            'teacher' => $teacher,
        ]);
    }

    
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        
        // ngambil subject yg blum memilki tecaher
        $subjects = Subject::doesntHave('teacher')
            ->orWhere('id', $teacher->subject_id)
            ->get();

        return view('admin.teachers.edit', [
            'title' => 'Edit Teacher',
            'teacher' => $teacher,
            'subjects' => $subjects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Custom validation messages
        $messages = [
            'subject_id.unique' => 'This subject has already been assigned to another teacher. Please select a different subject.',
        ];

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id|unique:teachers,subject_id,' . $id,
            'email'      => 'required|email|unique:teachers,email,' . $id,
            'phone'      => 'required|string|max:20',
            'address'    => 'nullable|string',
        ], $messages);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($validated);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher deleted successfully!');
    }
}