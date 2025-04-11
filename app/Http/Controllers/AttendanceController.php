<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classId = request()->query('class');

        $classrooms = Classroom::all();
        $students = Student::with('attendances', 'attendanceToday')->get();

        if ($classId) {
            $students = Student::with('attendances', 'attendanceToday')
                ->where('classroom_id', $classId)
                ->get();
        } else {
            $students = Student::with('attendances', 'attendanceToday')->get();
        }

        $studentIds = $students->pluck('id');

        $attendances = Attendance::with('student')->latest('updated_at')->whereIn('student_id', $studentIds)->whereToday('date')->get();

        return view('pages.attendance.index', compact('students', 'attendances', 'classrooms'));
    }

    public function create(Request $request)
    {
        $classId = $request->query('class');

        $classrooms = Classroom::all();
        $filteredClassroom = Classroom::with('students.attendanceToday');

        if ($classId) {
            $filteredClassroom = $filteredClassroom->find($classId);
        } else {
            $filteredClassroom = $filteredClassroom->first();
        }

        $students = $filteredClassroom->students;

        return view('pages.attendance.create', compact('classrooms', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|array'
        ]);

        $statuses = $validated['status'];

        foreach ($statuses as $studentId => $status) {
            if (empty($status['status']))
                continue;

            Attendance::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'date' => now()->toDateString(),
                ],
                [
                    'status' => optional($status)['status'],
                    'description' => optional($status)['description'],
                ]
            );
        }

        return redirect()->route('attendances.index')->with('success', 'Berhasil input kehadiran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
