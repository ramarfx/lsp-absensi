<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('pages.classroom.index', compact('classrooms'));
    }

    public function create()
    {
        return view('pages.classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $data = Classroom::create($validated);

        if (!$data) {
            return redirect()->back()->with('error', 'gagal menambahkan kelas');
        }

        return redirect()->route('class.index')->with('success', 'berhasil menambahkan kelas');
    }

    public function edit(Classroom $class)
    {
        return view('pages.classroom.update', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $class)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $data = $class->update($validated);

        if (!$data) {
            return redirect()->back()->with('error', 'gagal menambahkan kelas');
        }

        return redirect()->route('class.index')->with('success', 'berhasil menambahkan kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $class)
    {

        $class->delete();

        return redirect()->route('class.index')->with('success', 'berhasil menghapus kelas');
    }
}
