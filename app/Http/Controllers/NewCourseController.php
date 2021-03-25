<?php

namespace App\Http\Controllers;

use App\CourseStudent;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
//use App\Http\Controllers\WelcomeController;

class NewCourseController extends Controller
{
    public function index()
    {
        $courses_array = Course::getAllCourseName();
        $students_array = Student::getAllFullName();

        return view('new_course',[
            'courses' => $courses_array,
            'students' => $students_array,
        ]);
    }

    public function submit(Request $request)
    {
        $course = $_POST['select_course'];
        $student = $_POST['select_student'];
        
        $isPostValid = is_numeric($course) && is_numeric($student);

        if ($isPostValid) {
            CourseStudent::appendCourse($course, $student);
            echo "<script language='javascript'> alert('選課成功') </script>";
        } else {
            echo "<script language='javascript'> alert('非法輸入資訊：請重新嘗試') </script>";
        }

        $body = new WelcomeController;
        return $body->index();
    }
}