<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseStudy extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_study';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'point',
        'content',
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

    public function course()
    {
        return $this->belongsTo(
            'App\Models\Course'
        );
    }
}
?>