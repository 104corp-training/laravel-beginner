<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models;
use App\Models\Course;
use App\Models\Student;

class CourseStudent extends Model
{
    /**
     * Managed Table
     * 
     * @var string
     */
    protected $table = 'course_player';
    //protected $table = 'student_course';

    static public function index() 
    {
        echo "<h1>CPC Index</h1>";

        $arr = Course::getAllCourseName();

        foreach ($arr as $elem) {
            echo "<h5>$elem</h5>";
        }
        
        return;

        //$body = self::get();
        $body = Student::all();

        foreach ($body as $elem) {
            //echo "<h3>$elem->getFullNameAttribute()</h3>";
            $s = $elem->getFullNameAttribute();
            echo "<h4>$s</h4>";
        }
        //$s = $body->getFullNameAttribute();

        //var_dump($s);

        return;

        foreach ($body as $elem) {
                echo "<h3>";
                $t = gettype($elem);
                if ($t == 'array') {
                    foreach ($elem as $key => $value) {
                        echo " [$key => $value] ";
                    }
                } else if ($t == 'boolean') {
                    echo ($elem) ? "True" : "False";
                } else {
                    echo $elem;
                }
                echo "</h3>";
        }
    }

    static public function appendCourse(int $course_id, int $student_id)
    {
        $course_name = Course::find($course_id)->name;
        $student = Student::find($student_id);

        $student_fname = $student->first_name;
        $student_lname = $student->last_name;

        //$s = "'".$course." ".$student_fname." ".$student_lname."'";

        self::insert([
            'course_id' => $course_id,
            'course_name' => $course_name,
            'student_id' => $student_id,
            'student_fname' => $student_fname,
            'student_lname' => $student_lname,
        ]);

        //echo "<script language='javascript'> alert($s) </script>";
    }
}
