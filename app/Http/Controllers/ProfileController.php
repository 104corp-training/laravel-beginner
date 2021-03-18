<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;


class ProfileController extends Controller
{
    private $courseNameDict = [
        'PHPbasic' => "A basic php course, including variable, class, function etc.",
        'Laravel' => "Teaching about the best modern PHP frame ",
        'CleanCode' => "How to code a everybody ok code",
        'DesignPattern' => "How to solve the problem in various ways",
        'Git' => "Version control software",
        'Docker' => "A container-virtual-machine, lightweight, free, and with a cute whale when turning on",
        'CICD' => "Introduction of Continuous integrate/Continuous deploy",
        'SQL' => "Recognize database, teach the instruction like SELECT, WHERE, FROM etc.",
        'AWS' => "a cloud technology",
        'SearchEngine' => "Honest, I have no idea what it is",
        'WebApplicationSecurity' => "How to prevent sql injection or something like that",
        'Cryptography' => "basic encryption and decryption"
    ]; //
    public function index(Request $request)
    {
        # code...
        if (request()->name == null) {
            return view(
                'profile',
                [
                    'name' => 'CourseProfile',
                    'courseContent' => 'Wanna know what I am learning? Check the link !',
                    'courseNameDict' => $this->courseNameDict,
                ],
            );
        } elseif (!isset($this->courseNameDict[request()->name])) {
            return Response::HTTP_NOT_FOUND . " NOT FOUND THIS COURSE";
        }
        return view(
            'profile',
            [
                'name' => request()->name,
                'courseContent' => $this->courseNameDict[request()->name],
                'courseNameDict' => $this->courseNameDict,
            ],
        );
    }

    public function apiIndex(Request $request)
    {
        if(request()->name == null || !isset($this->courseNameDict[request()->name])) {
            return response()->json(
                [
                    'title' => "No Found at this path",
                    'code' => 500, 
                ],
            );
        } else {
            return response()->json(
                [
                    'title' => request()->name,
                    'courseContent' => $this->courseNameDict[request()->name],
                ]
            );
        } 
        
    }
    /**
     * @param Request $request
     */
    public function cache(Request $request)
    {
        if ($cacheTime = Cache::get('profileCacheTime')) {
            return response()->json([
                'time' => $cacheTime,
             ]);
        }

        $now = Carbon::now();
        Cache::set('profileCacheTime', $now, 60);

        return response()->json([
            'time' => $now,
        ]);
    }
}
