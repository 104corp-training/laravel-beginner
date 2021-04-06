<?php

namespace App\Models;

use App\Http\Controllers\WelcomeController;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class Comments extends Model
{
    /**
     * Table connected
     * 
     * @var string
     */
    protected $table = 'comment';

    public function getHttpInput(Request $request)
    {
        $ret = [];
        $ret['student_id'] = $request->input('select_id', 'no_id');
        $ret['select_student'] = $request->input('select_student', 'no_student');
        $ret['select_course'] = $request->input('select_course', 'no_course');
        $ret['select_score'] = $request->input('select_score', 'no_score');
        $ret['comment_content'] = $request->input('comment_content', 'no_comment');
        return $ret;
    }
    
    public function constructComment($data)
    {
        $comments = new Comments;
        $comments->student_id = $data['select_student'];
        $comments->course_id = $data['select_course'];
        $comments->score = $data['select_score'];
        $comments->comment = $data['comment_content'];
        return $comments;
    }

    public function appendComment(Request $request)
    {
        $http_input = $this->getHttpInput($request);

        $comments = $this->constructComment($http_input);

        $comments->save();

        echo "<script language='javascript'> alert('增加評論成功') </script>";

        return self::returnIndex();
    }

    public function updateComment(Request $request)
    {
        $http_input = $this->getHttpInput($request);

        self::where('id', $http_input['student_id'])->update(
            [
            'student_id' => $http_input['select_student'],
            'course_id' => $http_input['select_course'],
            'score' => $http_input['select_score'],
            'comment' => $http_input['comment_content'],
            ]
        );

        echo "<script language='javascript'> alert('更改評論成功') </script>";

        return self::returnIndex();
    }

    public function deleteComment(Request $request)
    {
        $http_input = $this->getHttpInput($request);

        self::where('id', $http_input['student_id'])->delete();

        echo "<script language='javascript'> alert('刪除評論成功') </script>";

        return self::returnIndex();
    }

    public function student()
    {
        return $this->belongsTo(
            Student::class,
            'student_id',
            'id'
        );
    }

    public function course()
    {
        return $this->belongsTo(
            Course::class,
            'course_id',
            'id'
        );
    }

    static public function returnIndex()
    {
        $body = new WelcomeController;
        return $body->index();
    }
}
