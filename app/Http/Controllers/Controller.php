<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getRequest($operation, $sub_operation)
    {
        switch ($operation) {
            case 'operation':
                return OperationController::show($sub_operation);
                break;

            case 'submit':
                return $this->submitRequest($sub_operation);
                break;

            default:
                return;
                break;
        }
    }

    public function postRequest(Request $request, $operation)
    {
        switch ($operation) {
            case 'new_comment':
                return Comments::appendComment($request);
                break;
            case 'new_course':
                return NewCourseController::submit($request);
                break;
            default:
                return;
                break;
        }
    }

    public function submitRequest($sub_operation)
    {
        switch ($sub_operation) {
            case 'newCourse':
                return NewCourseController::mainPage();
                break;
            case 'newComment':
                return Comments::mainPage();
                break;
            default:
                return;
                break;
        }
    }
}
