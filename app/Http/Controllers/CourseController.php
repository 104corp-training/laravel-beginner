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
        return view('course',['records' => [$course]]);
    }
}
