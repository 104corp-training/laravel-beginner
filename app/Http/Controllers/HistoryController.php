<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function histories($courseId) {
        return History::select('course_date','description')
                        ->where('course_id', $courseId)
                        ->orderBy('course_date')
                        ->get();
    }
}
