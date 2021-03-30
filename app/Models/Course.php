<?php

namespace App\Models;

use App\Comments;
use App\CourseStudent;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'outline',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'outline' => '',
    ];

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'student_course',
            'course_id',
            'student_id'
        );
    }

    static public function getAllCourseName()
    {
        $ret = [];
        $courses = self::all();

        foreach ($courses as $course) {
            $ret[] = $course->name;
        }

        return $ret;
    }

    public function attendStudents()
    {
        return $this->hasMany(
            CourseStudent::class,
            'course_id'
        );
    }

    public function comments()
    {
        return $this->hasMany(
            Comments::class,
            'course_id'
        );
    }
}
