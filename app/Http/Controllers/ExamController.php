<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Exceptions\APIException;


class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Exam::all()->toArray();
    }

    /**
     * 當門課程的所有考試
     */
    public function test()
    {
        echo 'test';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'student_id' => 'required|int',
            'course_id' => 'required|int',
            'exam_id' => 'required|int',
            'exam_score' => 'required|int|max:100',
        ]);
        if ($validator->fails()) {
            throw new APIException('驗證錯誤' , 422);
        }

        $examForm = [
            'student_id' => $request->get('student_id'),
            'course_id' => $request->get('course_id'),
            'exam_id' => $request->get('exam_id'),
            'exam_score' => $request->get('exam_score'),
        ];
        $status = Exam::create($examForm);
        return ['success' => $status];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $examId
     * @return \Illuminate\Http\Response
     */
    public function show($examId)
    {
        $status = Exam::find($examId);
        return ['success' => $status];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $examId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $examId)
    {
        try {
            $request->validate([
                'exam_score' => 'required|int|max:100',
            ]);
        } catch (\Exception $e) {
            throw new APIException($e->getMessage() , 422);
        }

        if (! $course = Exam::find($examId)) {
            throw new APIException('考試找不到', 404);
        }

        $status = $course->update($request->toArray());
        return ['success' => $status];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $examId
     * @return \Illuminate\Http\Response
     */
    public function destroy($examId)
    {
        if (! $exams = Exam::find($examId)) {
            throw new APIException('考試找不到', 404);
        }
        $status = $exams->delete();
        return ['success' => $status];
    }
}
