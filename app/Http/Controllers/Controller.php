<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\CourseStudent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getRequest($resource, $target)
    {
        switch ($resource) {
        case 'pages':
            return OperationController::show($target);
            break;

        case 'upload':
            return $this->submitRequest($target);
            break;

        default:
            abort(404);
            break;
        }
    }

    public function postRequest(Request $request, $resource, $target)
    {
        switch ($resource) {
        case 'courses':
            return $this->postRequestCource($request, $target);
            break;
        case 'comments':
            return $this->postRequestComment($request, $target);
            break;
        default:
            abort(404);
            break;
        }
    }

    public function postRequestCource($request, $target)
    {
        switch ($target) {
        case 'new':
            return CourseStudent::appendCourse($request);
            break;
        default:
            abort(404);
            break;
        }
    }

    public function postRequestComment($request, $target)
    {
        switch ($target) {
        case 'new':
            return Comments::appendComment($request);
            break;
        case 'update':
            return Comments::updateComment($request);
            break;
        case 'delete':
            return Comments::deleteComment($request);
            break;
        default:
            abort(404);
            break;
        }
    }

    public function submitRequest($target)
    {
        switch ($target) {
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
            abort(404);
            break;
        }
    }
}
