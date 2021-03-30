<?php

namespace App\Models;

use App\Comments;
use App\CourseStudent;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'register_at',
    ];

    protected $casts = [
        'register_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }

    public function profile()
    {
        return $this->hasOne(
            Profile::class,
            'student_id'
        );
    }

    public function profiles()
    {
        return $this->hasMany(
            Profile::class,
            'student_id'
        );
    }

    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'student_course',
            'student_id',
            'course_id'
        );
    }

    static public function getAllFullName()
    {
        $ret = [];
        $students = self::all();

        foreach ($students as $student) {
            $ret[] = $student->getFullNameAttribute();
        }

        return $ret;
    }

    public function attendCourses()
    {
        return $this->hasMany(
            CourseStudent::class,
            'student_id'
        );
    }

    public function comments()
    {
        return $this->hasMany(
            Comments::class,
            'student_id'
        );
    }
}
