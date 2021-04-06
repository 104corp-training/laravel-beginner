<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function postRequestCource(Request $request, $target)
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

    public function postRequestComment(Request $request, $target)
    {
        $main = new Comments;
        switch ($target) {
        case 'new':
            return $main->appendComment($request);
            break;
        case 'update':
            return $main->updateComment($request);
            break;
        case 'delete':
            return $main->deleteComment($request);
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
            $target_page = 'new_comment';
            $resource = [
                'courses' => Course::getAllCourseName(),
                'students' => Student::getAllFullName(),
            ];
            break;

        case 'updateComment':
            $target_page = 'update_comment';
            $resource = [
                'comments' => Comments::all(),
                'courses' => Course::getAllCourseName(),
                'students' => Student::getAllFullName(),
            ];
            break;

        case 'deleteComment':
            $target_page = 'delete_comment';
            $resource = [
                'comments' => Comments::all(),
            ];
            break;
            
        default:
            abort(404);
            break;
        }
        return view($target_page, $resource);
    }
}
