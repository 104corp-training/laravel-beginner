<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */

    public function index(Request $request)
    {
        $courses = DB::table('Course')->get();
        return view('courses', ['records' => [$courses]]);
    }

    public function page($id)
    {
        $course = DB::table('Course')->where('id', $id)->get();
        $exam = DB::table('Course_exam')
            ->join('student', 'student_id', '=', 'student.id')
            ->where('course_id', $id)
            ->select('Course_exam.course_exam_id','Course_exam.course_exam_score','student.first_name','student.last_name')
            ->get();

        return view(
            'course',
            [
                'records' => [$course],
                'exams' => [$exam]
            ]
        );
    }
}
