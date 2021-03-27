<?php

namespace App\Http\Controllers;

use App\Exceptions\APIException;
use App\Hunter;
use App\Models\Course;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CourseController;

//TODO: post store 寫insert into的方法
//TODO: get apiIndex 寫select *
//TODO: get show 寫select by ID
//TODO: put update 寫update
//TODO: delete 寫delete 
class HunterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Hunter::all()->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            throw new APIException('Validation error', 422);
        }

        $courseForm = [
            'id' => $request->get('id'),
            'course_id' => $request->get('course_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description') ?? '',
            'outline' => $request->get('outline') ?? ''
        ];

        $status = Hunter::create($courseForm);

        return ['success' => $status];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hunter  $hunter
     * @return \Illuminate\Http\Response
     */
    public function show($hunter)
    {
        //
        if (Hunter::find($hunter) == null) {
            throw new APIException('Cannot find this course', 404);
        } else {
            return json_encode(Hunter::find($hunter)->toArray());
        }      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hunter  $hunter
     * @return \Illuminate\Http\Response
     */
    public function edit(Hunter $hunter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hunter  $hunter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hunter)
    {
        //
        try {
            $request->validate([
                'name' => 'required|string|max:20',
            ]);
        } catch (\Exception $e) {
            throw new APIException('Cannot find this course', 404);
        }
        if (!$course = Hunter::find($hunter)) {
            throw new APIException('Cannot find this course', 404);
        }

        $status = $course->update($request->toArray());
        return ['success' => $status];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hunter  $hunter
     * @return \Illuminate\Http\Response
     */
    public function destroy($hunter)
    {
        //
        if (!$course = Hunter::find($hunter)) {
            throw new APIException('Cannot find this course', 404);
        }
        $status = $course->delete();
        return ['success' => $status];
        
    }
}
