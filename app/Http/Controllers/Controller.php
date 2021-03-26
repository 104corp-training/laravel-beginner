<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getRequest($operation, $sub_operation)
    {
        switch ($operation) {
            case 'operation':
                return OperationController::show($sub_operation);
                break;

            case 'new_class':
                return NewCourseController::mainPage();
                break;

            default:
                return;
                break;
        }
    }
}
