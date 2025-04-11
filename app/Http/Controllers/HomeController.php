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

        $attendances = Attendance::with('student')->latest('updated_at')->whereIn('student_id', $studentIds)->whereToday('date')->paginate(10);

        return view('home', compact('students', 'attendances', 'classrooms'));
    }
}
