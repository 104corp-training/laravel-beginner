<?php
namespace App\Http\Controllers;

use App\Exceptions\APIException;
use App\Models\Course;
use App\Services\CourseService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CourseStudy; 

class courseStudyController extends Controller
{
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
        $records = CourseStudy::get();
        return view(
            'course',
            compact('records')
            
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            //$messages = $validator->errors()->getMessages();
            throw new APIException('驗證錯誤' , 422);
        }

        $coursestudyForm = [
            'name' => $request->get('name'),
            'point' => $request->get('point'),
            'content' => trim($request->get('content')) ?? '',
            'outline' => $request->get('outline') ?? '',
        ];
        $status = CourseStudy::create($coursestudyForm);

    }

   
    public function show($id)
    {
        try {
            $courseResource = $this->service->getCourseById($id);
        } catch (Exception $e) {
            throw new APIException('找不到對應課程', 404);
        }
        return $courseResource;
        
    }

    public function update(Request $request,$id) {
        try {
            $request->validate([
                'name' => 'required|string|max:20',
            ]);
        } catch (\Exception $e) {
            throw new APIException($e->getMessage() , 422);
        }

        if (! $course = CourseStudy::find($id)) {
            throw new APIException('課程找不到', 404);
        }
        $status = $course->update($request->toArray());
        return ['success' => $status];
    }


    public function destroy($id)
    {
        if (! $course = CourseStudy::find($id)) {
            throw new APIException('課程找不到', 404);
        }
        $status = $course->delete();
        return ['success' => $status];
    }
}

