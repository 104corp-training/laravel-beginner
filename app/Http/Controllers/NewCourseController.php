<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;

class NewCourseController extends Controller
{
    static public function mainPage()
    {
        $courses_array = Course::getAllCourseName();
        $students_array = Student::getAllFullName();

        return view(
            'new_course', [
            'courses' => $courses_array,
            'students' => $students_array,
            ]
        );
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}