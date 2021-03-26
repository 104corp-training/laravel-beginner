<?php

namespace App;

use App\Http\Controllers\WelcomeController;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class Comments extends Model
{
    protected $table = 'comment';

    static public function mainPage()
    {
        $courses_array = Course::getAllCourseName();
        $students_array = Student::getAllFullName();

        return view('new_comment',[
            'courses' => $courses_array,
            'students' => $students_array,
        ]);
    }

    static public function appendComment(Request $request)
    {
        $student = $_POST['select_student'];
        $course = $_POST['select_course'];
        $score = $_POST['select_score'];
        $comment = $_POST['comment_content'];

        $comments = new Comments;
        $comments->student_id = $student;
        $comments->course_id = $course;
        $comments->score = $score;
        $comments->comment = $comment;

        $comments->save();

        echo "<script language='javascript'> alert('增加評論成功') </script>";

        $body = new WelcomeController;
        return $body->index();
    }
}
