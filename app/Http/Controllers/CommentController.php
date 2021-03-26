<?php

namespace App\Http\Controllers;

use App\Exceptions\APIException;
use App\Models\Course;
use App\Services\CourseService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment; 

class CommentController extends Controller
{
    // do crud from api

    /**
     * @var CourseService
     */
    private $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::all()->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
            comment_table單純只有儲存評論
            應該不需要驗證

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            //$messages = $validator->errors()->getMessages();
            throw new APIException('驗證錯誤' , 422);
        }
        */

        $courseForm = [
            'edit_id' => $request->get('edit_id'),
            'comment_id' => $request->get('comment_id'),
            'text' => $request->get('text') ?? '',
        ];
        $status = Comment::create($courseForm);

        return ['success' => $status];
    }

    /**
     * Display the specified resource.
     *
     * @param int $courseId
     * @return \App\Http\Resources\CourseResource
     * @throws APIException
     */
    public function show($courseId)
    {
        /*
        try {
            $courseResource = $this->service->getCourseById($courseId);
        } catch (Exception $e) {
            throw new APIException('找不到對應評論', 404);
        }
        */
        $commentResource = Comment::find($courseId);
        return $commentResource;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $courseId
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        $courseId
    ) {

        /*
        目前暫時用不到驗證

        try {
            $request->validate([
                'name' => 'required|string|max:20',
            ]);
        } catch (\Exception $e) {
            throw new APIException($e->getMessage() , 422);
        }
        */

        if (! $comment = Comment::find($courseId)) {
            throw new APIException('評論找不到', 404);
        }
        $status = $comment->update($request->toArray());
        return ['success' => $status];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $courseId
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId)
    {
        if (! $comment = Comment::find($courseId)) {
            throw new APIException('課程找不到', 404);
        }
        $status = $comment->delete();
        return ['success' => $status];
    }

}
