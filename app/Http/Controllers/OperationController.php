<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class OperationController extends Controller
{
    /**
     * Use to get operation code and output the correct outout.
     * 
     * @param int $op_code
     * @return Response
     */
    public function show($op_code)
    {
        $isOpcodeValid = isset( $this->_dictionary[ $op_code ] );

        if ($isOpcodeValid) {
            return view('operation_valid', $this->_dictionary[ $op_code ]);
        } else {
            return view('operation_pot');
        }
    }
}