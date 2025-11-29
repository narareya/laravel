<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminTeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::paginate(10);
        $subjects = Subject::all();

        return view('admin.teachers.index', [
            'title' => 'Teachers',
            'teachers' => $teachers,
            'subjects' => $subjects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();

        return view('admin.teachers.create', [
            'subjects' => $subjects,
            'teachers' => Teacher::paginate(5)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'email'      => 'required|email|unique:teachers,email',
            'phone'      => 'required|string|max:20',
            'address'    => 'nullable|string',
        ]);

        Teacher::create($validated);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Teacher created successfully!');
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
        $teachers = Teacher::findOrFail($id);
        $subjects = Subject::whereDoesntHave('teacher')
            ->orWhereHas('teacher', fn($q) => $q->where('id', $teachers->id))
            ->get();

        return view('admin.teacher.edit', compact('teachers', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'email'      => 'required|email|unique:teachers,email,' . $id,
            'phone'      => 'required|string|max:20',
            'address'    => 'nullable|string',
        ]);

        $teachers = Teacher::findOrFail($id);
        $teachers->update($validated);

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

        return redirect()->route('admin.teachers.index')->with('success', 'Data berhasil dihapus !');
    }
}
