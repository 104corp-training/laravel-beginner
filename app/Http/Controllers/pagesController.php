<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\CourseStudy;


class pagesController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index($id)
    {
        $pages = Course::find($id)->courseStudy;
        //$pages = DB::table('course_study')->find($id);
        return view(
            'pages',
            compact('pages')
            
        );
    }
    
}