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
        $DETAILORDER = 'select * from course where id = '.strval($courseId);
        $data = DB::select($DETAILORDER);

        $ret = [];

        foreach ($data as $elem) {
            foreach ($elem as $key => $value) {
                $ret[ $key ] = $value;
            }
        }

        $isRetValid = ( count($ret) != 0 );
        
        if ( $isRetValid ) {
            return view('operation_valid', $ret);
        } else {
            return view('operation_pot');
        }
    }
}