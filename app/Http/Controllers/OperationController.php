<?php

namespace App\Http\Controllers;

use App\CourseStudent;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\Course;

class OperationController extends Controller
{
    /**
     * Use to get operation code and output the correct outout.
     * 
     * @param int $courseId
     * @return Response
     */
    public function show($courseId)
    {
        $ret = [];
        
        //$searchResult = CourseStudent::where("course_id", "=", $courseId)->get();
        $course = Course::find($courseId);
        $searchResult = $course->attendStudents;

        $isSearchNotEmpty = !(count($searchResult) == 0);
        $isSearchValid = ($course != null) ? true : false;
        
        if ($isSearchValid) {
            $ret[ 'searchResult' ] = $isSearchNotEmpty ? ($searchResult) : false;
            $ret[ 'name' ] = $course->name;
            $ret[ 'description'] = $course->description;
            $ret[ 'outline' ] = $course->outline;

        return view('operation_valid', $ret);
        } else {
            return view('operation_pot');
        }
    }
}