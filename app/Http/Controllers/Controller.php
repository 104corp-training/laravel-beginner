<?php

namespace App\Http\Controllers;

use App\Comments;
use App\CourseStudent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getRequest($resource, $action)
    {
        switch ($resource) {
            case 'pages':
                return OperationController::show($action);
                break;

            case 'upload':
                return $this->submitRequest($action);
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
                return CourseStudent::appendCourse($request);
                break;
            case 'update_comment':
                return Comments::updateComment($request);
                break;
            case 'delete_comment':
                return Comments::deleteComment($request);
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
                return Comments::mainPage('create');
                break;
            case 'updateComment':
                return Comments::mainPage('update');
                break;
            case 'deleteComment':
                return Comments::mainPage('delete');
                break;
            default:
                return;
                break;
        }
    }
}
