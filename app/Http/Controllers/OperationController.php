<?php

namespace App\Http\Controllers;

use App\Comments;
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
    static public function show($courseId)
    {
        $ret = [];
        
        $course = Course::find($courseId);
        $searchResult = $course->attendStudents;

        $isSearchNotEmpty = !(count($searchResult) == 0);
        $isSearchValid = ($course != null) ? true : false;

        $comment = $course->comments;
        $isCommentNotEmpty = ( count($comment) != 0) ? true : false;
        
        if ($isSearchValid) {
            $ret[ 'searchResult' ] = $isSearchNotEmpty ? ($searchResult) : false;

            $ret[ 'name' ] = $course->name;
            $ret[ 'description'] = $course->description;
            $ret[ 'outline' ] = $course->outline;
            
            $ret[ 'comments' ] = ($isCommentNotEmpty) ? $comment : false;

            return view('operation_valid', $ret);
        } else {
            return view('operation_pot');
        }
    }
}