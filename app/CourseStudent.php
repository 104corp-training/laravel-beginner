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

    static public function appendCourse(int $course_id, int $student_id)
    {
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
