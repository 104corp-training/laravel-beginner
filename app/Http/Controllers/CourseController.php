<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Exam;
use Exception;
use App\Exceptions\APIException;

class CourseController extends Controller
{
    /**
     * 回傳所有課程資訊
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $courses = Course::all()->toArray();
        $result = ['records' => $courses];
        return view('courses', $result);
    }

    /**
     * 回傳單一課程資訊
     * @int $id
     * @return View
     */
    public function page($id)
    {
        if (! $course = Course::find($id)) {
            return '課程找不到';
        }

        $courses = Course::find($id)->where('id','=',$id)->get()->toArray();
        $exams = Course::find($id)->exams()->get()->toArray();
        $result = [
            'records' => $courses,
            'exams' => $exams
        ];
        return view('course', $result);
    }
}
