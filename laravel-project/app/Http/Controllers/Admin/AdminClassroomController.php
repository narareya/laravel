<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::with([
            'teacher:id,name',
            'students:id,name,classroom_id'
        ])->paginate(10);
        $teachers = Teacher::all();

        return view('admin.classroom.index', [
            'title' => 'Classroom',
            'classrooms' => $classrooms,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();

        return view('admin.classroom.create', [
            'teachers' => $teachers,
            'classroom' => Classroom::paginate(5)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Classroom::create($validated);

        return redirect()->route('admin.classroom.index')
            ->with('success', 'Classroom created successfully!');
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
        $classroom = Classroom::findOrFail($id);
        $teachers = Teacher::all();
        return view('admin.classroom.edit', compact('classroom', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->update($validated);

        return redirect()->route('admin.classroom.index')
            ->with('success', 'Classroom updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classrooms = Classroom::findOrFail($id);
        $classrooms->delete();

        return redirect()->route('admin.classroom.index')->with('success', 'Data berhasil dihapus !');
    }
}
