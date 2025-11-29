<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardiansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardians = Guardian::paginate(10);

        return view('admin.guardians.index', [
            'title' => 'Guardians',
            'guardians' => $guardians,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guardians = Guardian::all();

        return view('admin.guardians.create', [
            'guardians' => $guardians,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'gender'     => 'required|string',
            'job'        => 'required|string',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|unique:students,email',
            'address'    => 'nullable|string',
        ]);

        Guardian::create($validated);

        return redirect()->route('admin.guardians.index')
            ->with('success', 'Guardian created successfully!');
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
        $guardians = Guardian::findOrFail($id);
        return view('admin.guardians.edit', compact('guardians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'gender'     => 'required|string',
            'job'        => 'required|string',
            'phone'      => 'required|string|max:20',
            'email' => 'required|email|unique:students,email,' . $id,
            'address'    => 'nullable|string',
        ]);

        $guardians = Guardian::findOrFail($id);
        $guardians->update($validated);

        return redirect()->route('admin.guardians.index')
            ->with('success', 'Guardian updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guardians = Guardian::findOrFail($id);
        $guardians->delete();

        return redirect()->route('admin.guardians.index')->with('success', 'Data berhasil dihapus !');
    }
}
