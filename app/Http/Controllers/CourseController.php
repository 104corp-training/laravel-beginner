<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;


//TODO: 2. 把資料拉給seeder
//TODO: 3. function寫index並連結資料庫
class CourseController extends Controller
{   
    private $courseData;

    public function __construct()
    {   //database取出來的就是一堆物件，裡面有一個叫做name的屬性，可以直接拿出來用
        //DB::table('course')->get('name') //原本使用這個操作
        //但是現在改用模型操作，模型有指定table
        /**
         * 減少資料庫查詢的次數，所以在建構子就把需要用到的屬性都放進陣列中
         */

        foreach(Course::all() as $obj){
            $this->courseData[$obj->course_id] = [
                'name' => $obj->name,
                'description' => $obj->description,
                'outline' => $obj->outline, 
            ];
        }
    }
    public function index(Request $request)
    {
        # code...
        if (request()->courseAddr == null) {
            return view(
                'courseIndex',
                [
                    'courseAddr' => 'CourseProfile',
                    'courseDescription' => 'Wanna know what I am learning? Check the link !',
                    'courseData' => $this->courseData,
                ],
            );
        } elseif (!isset($this->courseData[request()->courseAddr])) {
            return Response::HTTP_NOT_FOUND . " NOT FOUND THIS COURSE";
        }
        return view(
            'course',
            [
                'courseAddr' => $this->courseData[request()->courseAddr]['name'],
                'courseDescription' => $this->courseData[request()->courseAddr]['description'],
                'courseExperience' => $this->courseData[request()->courseAddr]['outline'],
                'courseData' => $this->courseData,
            ],
        );
    }


    public function apiIndex(Request $request)
    {
        if(request()->courseAddr == null || !isset($this->courseData[request()->courseAddr])) {
            return response()->json(
                [
                    'title' => "No Found at this path",
                    'code' => 500, 
                ],
            );
        } else {
            return response()->json(
                [
                    'title' => $this->courseData[request()->courseAddr]['name'],
                    'courseDescription' => $this->courseData[request()->courseAddr]['description'],
                    'Study Experience' => $this->courseData[request()->courseAddr]['outline'],
                ]
            );
        } 
        
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
}

