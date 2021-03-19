<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;

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
        $DETAILSELECT = 'select * from course where id = '.strval($courseId);
        $data = DB::select($DETAILSELECT);

        $ret = [];

        foreach ($data as $elem) {
            foreach ($elem as $key => $value) {
                $ret[ $key ] = $value;
            }
        }

        $searchResult = $this->getStudentByCourse($courseId);

        $isRetNotEmpty = ( count($ret) != 0 );
        
        if ( $isRetNotEmpty ) {
            $ret[ 'searchResult' ] = $searchResult;
            return view('operation_valid', $ret);
        } else {
            return view('operation_pot');
        }
    }

    /**
     * Get the information of students by course id
     * 
     * @param int $courseId
     * @return array
     */
    public function getStudentByCourse($courseId) {
        $DETAILSELECT = 'select * from student_course where course_id = '.strval($courseId);
        $data = DB::select($DETAILSELECT);

        $studentId = [];

        foreach ($data as $elem) {
            foreach ($elem as $key => $value) {
                if ($key === 'student_id') {
                    $studentId[] = $value;
                }
            }
        }

        $isStuIdEmpty = ( count($studentId) != 0);

        if ( $isStuIdEmpty ) {
            $studentId = $this->getStudentById($studentId);
            return $studentId;
        } else {
            return false;
        }
    }

    public function getStudentById($id_array) {
        $sql = 'select * from student where id in (' . implode(',', $id_array) . ')';
        $data = DB::select($sql);
        return $data;
    }
}