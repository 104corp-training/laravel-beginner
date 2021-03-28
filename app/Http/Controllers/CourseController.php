<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;


class CourseController extends Controller
{   
    private $courseData;

    public function __construct()
    {   //database取出來的就是一堆物件，裡面有一個叫做name的屬性，可以直接拿出來用
        //DB::table('course')->get('name') //原本使用這個操作
        //但是現在改用模型操作，模型有指定table
        /**
         * 減少資料庫查詢的次數，所以在建構子就把需要用到的屬性都放進陣列中
         * 
         * 
         */

        // foreach(Course::all() as $obj){
        //     $this->courseData[$obj->course_id] = [
        //         'id' => $obj->id,
        //         'name' => $obj->name,
        //         'description' => $obj->description,
        //         'outline' => $obj->outline, 
        //         'created_at' => $obj->created_at,
        //         'updated_at' => $obj->updated_at,
        //     ];
        // }
        //$arr[8]["students"][0]["course_id"]
        foreach(Course::with('students')->get() as $obj){
            if(count($obj->students) == 0){
                $this->courseData[$obj->course_id] = [
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'description' => $obj->description,
                    'outline' => $obj->outline, 
                    'created_at' => $obj->created_at,
                    'updated_at' => $obj->updated_at,
                    //'students' => $obj->students[0]["first_name"]." ".$obj->students[0]["last_name"],
                    'students' => "Seems that nobody wanna take this QQ",
                ];
            } else {
                $this->courseData[$obj->course_id] = [
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'description' => $obj->description,
                    'outline' => $obj->outline, 
                    'created_at' => $obj->created_at,
                    'updated_at' => $obj->updated_at,
                    'students' => $obj->students,
                ];
                
            }
            
        }
        
    }
    /**
     * 判斷網址/course後面接什麼
     * 
     * if null return courseIndex.blade.php
     * if not isset return HTTP_NOT_FOUND
     * if true return course.blade.php
     * @param $request
     * 
     * @return courseIndex | course | HTTP_NOT_FOUNT
     */
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
                'courseMember' => $this->courseData[request()->courseAddr]['students'],
            ],
        );
    }

    
    // public function apiIndex(Request $request)
    // {
    //     if(request()->courseAddr == null || !isset($this->courseData[request()->courseAddr])) {
    //         return response()->json(
    //             [
    //                 'title' => "No Found at this path",
    //                 'code' => 500, 
    //             ],
    //         );
    //     } else {
    //         return response()->json(
    //             [
    //                 'title' => $this->courseData[request()->courseAddr]['name'],
    //                 'courseDescription' => $this->courseData[request()->courseAddr]['description'],
    //                 'Study Experience' => $this->courseData[request()->courseAddr]['outline'],
    //             ]
    //         );
    //     } 
        
    // }
    
    public function show(Request $request)
    {
        if(!isset($this->courseData[request()->courseAddr])) {
            return response()->json(
                [
                    'title' => "No Found at this path",
                    Response::HTTP_NOT_FOUND, 
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
    public function apiIndex(Request $request)
    {
        # code...
        return response($this->courseData, Response::HTTP_CREATED);
        
    }

    public function store(Request $request)
    {
        # code...
    }

    public function update(Request $request)
    {
        # code...
    }
    
    public function delete(Request $request)
    {
        # code...
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

