<?php

namespace App;

use App\Http\Controllers\WelcomeController;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class Comments extends Model
{
    protected $table = 'comment';

    static public function mainPage($order = null)
    {
        switch ($order) {
        case 'create':
            $target_page = 'new_comment';

            $resourse = [
                'courses' => Course::getAllCourseName(),
                'students' => Student::getAllFullName(),
            ];
            break;

        case 'update':
            $target_page = 'update_comment';

            $resourse = [
                'comments' => self::all(),
                'courses' => Course::getAllCourseName(),
                'students' => Student::getAllFullName(),
            ];
            break;

        case 'read':
            $target_page = 'read_comment';

            $resourse = null;
            break;

        case 'delete':
            $target_page = 'delete_comment';

            $resourse = [
                'comments' => self::all(),
            ];;
            break;

        default:
            echo "Error: Invalid Comments Order";
            return;
            break;
        }

        return view($target_page, $resourse);
    }

    static public function appendComment(Request $request)
    {
        $student = $_POST['select_student'];
        $course = $_POST['select_course'];
        $score = $_POST['select_score'];
        $comment = $_POST['comment_content'];

        $comments = new Comments;
        $comments->student_id = $student;
        $comments->course_id = $course;
        $comments->score = $score;
        $comments->comment = $comment;

        $comments->save();

        echo "<script language='javascript'> alert('增加評論成功') </script>";

        return self::returnIndex();
    }

    static public function updateComment(Request $request)
    {
        $target_id = $_POST['select_id'];
        $student = $_POST['select_student'];
        $course = $_POST['select_course'];
        $score = $_POST['select_score'];
        $comment = $_POST['comment_content'];

        self::where('id', $target_id)->update(
            [
            'student_id' => $student,
            'course_id' => $course,
            'score' => $score,
            'comment' => $comment,
            ]
        );

        echo "<script language='javascript'> alert('更改評論成功') </script>";

        return self::returnIndex();
    }

    static public function deleteComment(Request $request)
    {
        $target_id = $_POST['select_id'];

        self::where('id', $target_id)->delete();

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
