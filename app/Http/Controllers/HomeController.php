<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use App\Models\Attendance;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
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

        $lateStudents = Attendance::where('status', 'Terlambat')->whereToday('date')->count();
        $presentStudents = Attendance::where('status', 'Hadir')->orWhere('status', 'Terlambat')->whereToday('date')->count();
        $totalStudents = Student::count();

        return view('home', compact('students', 'attendances', 'classrooms', 'lateStudents', 'presentStudents', 'totalStudents'));
    }
}
