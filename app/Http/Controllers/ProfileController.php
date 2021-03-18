<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $courses = Course::all();
        return view(
            'profile',
            [
                'name' => 'Natz Liu',
                'id' => 1234,
                'records' => $courses,
            ]
        );
    }

    /**
     * @param Request $request
     */
    public function cache(Request $request)
    {
        if ($cacheTime = Cache::get('profileCacheTime')) {
            return response()->json([
                'time' => $cacheTime,
             ]);
        }

        $now = Carbon::now();
        Cache::set('profileCacheTime', $now, 60);

        return response()->json([
            'time' => $now,
        ]);
    }

    /**
     * @param Request $request
     */
    public function course($id)
    {
        $course = Course::find($id);
        return view(
            'course',
            [
                'data' => $course,
            ],
        );
    }
}
