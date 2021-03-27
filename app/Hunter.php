<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hunter extends Model
{
    //
    protected $table = 'course';
    protected $fillable = [
        'id',
        'course_id',
        'name',
        'description',
        'outline',
    ];
}
