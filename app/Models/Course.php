<?php

namespace App\Models;

use App\Models\Comments;
use App\Models\CourseStudent;
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
        return self::get('name')->toArray();
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
