<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\Course;

class OperationController extends Controller
{
    /**
     * Use to get operation code and output the correct outout.
     * 
     * @param int $courseId
     * 
     * @return Response
     */
    static public function show($courseId)
    {
        $ret = [];
        
        $course = Course::find($courseId);

        if (!$course) {
            abort(404);
        }

        $searchResult = $course->attendStudents;

        $isSearchNotEmpty = empty($searchResult);
        $isSearchInvalid = ($course == null) ? true : false;

        $comment = $course->comments;
        $isCommentNotEmpty = ! empty($comment);
        
        if ( $isSearchInvalid ) {
            abort(404);
            
        } else {
            $ret[ 'searchResult' ] = $isSearchNotEmpty ? ($searchResult) : false;

            $ret[ 'name' ] = $course->name;
            $ret[ 'description'] = $course->description;
            $ret[ 'outline' ] = $course->outline;
            
            $ret[ 'comments' ] = ($isCommentNotEmpty) ? $comment : false;

            return view('operation_valid', $ret);
        }
    }
}