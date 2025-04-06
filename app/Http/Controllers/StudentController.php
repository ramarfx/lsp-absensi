<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classId = request()->query('class');
        $classrooms  = Classroom::all();

        $filteredClassroom = Classroom::with('students.attendanceToday');

        if ($classId) {
            $filteredClassroom = $filteredClassroom->find($classId);
        } else {
            $filteredClassroom = $filteredClassroom->first();
        }

        $students = $filteredClassroom->students;

        return view('pages.student.index', compact('students', 'classrooms'));
    }

    public function create()
    {
        $classroom  = Classroom::all();

        return view('pages.student.create', compact('classroom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|integer',
            'name' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
            'gender' => 'required|boolean',
        ]);

        $data = Student::create($validated);

        if (!$data) {
            return redirect()->back()->with('error', 'gagal menambahkan siswa');
        }

        return redirect()->route('students.index')->with('success', 'berhasil menambahkan siswa');
    }

    public function edit(Student $student)
    {
        $classroom = Classroom::all();

        return view('pages.student.update', compact('student', 'classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nis' => 'required|integer',
            'name' => 'required|string',
            'classroom_id' => 'required|exists:classrooms,id',
            'gender' => 'required|boolean',
        ]);

        $data = $student->update($validated);

        if (!$data) {
            return redirect()->back()->with('error', 'gagal mengubah siswa');
        }

        return redirect()->route('students.index')->with('success', 'berhasil mengubah siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'berhasil menghapus siswa');
    }
}
