<?php

namespace App;

use App\Http\Controllers\WelcomeController;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseStudent extends Model
{
    /**
     * Managed Table
     * 
     * @var string
     */
    protected $table = 'course_player';

    static public function appendCourse(Request $request)
    {
        $course_id = $_POST['select_course'];
        $student_id = $_POST['select_student'];
        
        $isPostValid = is_numeric($course_id) && is_numeric($student_id);

        if ($isPostValid) {
            $course_name = Course::find($course_id)->name;
            $student = Student::find($student_id);

            $student_fname = $student->first_name;
            $student_lname = $student->last_name;

            $courseStudent = new CourseStudent;

            $courseStudent->course_id = $course_id;
            $courseStudent->course_name = $course_name;
            $courseStudent->student_id = $student_id;
            $courseStudent->student_fname = $student_fname;
            $courseStudent->student_lname = $student_lname;

            $courseStudent->save();

            echo "<script language='javascript'> alert('選課成功') </script>";

        } else {
            echo "<script language='javascript'> alert('非法輸入資訊：請重新嘗試') </script>";
        }

        $body = new WelcomeController;
        return $body->index();
    }

    public function findStudent()
    {
        return $this->belongsTo(
            Student::class,
            'id',
            'student_id'
        );
    }
    
    public function findCourse()
    {
        return $this->belongsTo(
            Course::class,
            'id',
            'course_id'
        );
    }
}
