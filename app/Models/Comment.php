<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comment';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'edit_id',
        'comment_id',
        'text',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'text' => '',
    ];

    /*
    public function student()
    {
        return $this->hasOne(
            Student::class,
            'id',
            'edit_id'
        );
    }
    */


}
