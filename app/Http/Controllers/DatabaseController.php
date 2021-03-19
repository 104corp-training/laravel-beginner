<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

class DatabaseController extends Controller
{
    /**
     * 顯示應用程式中所有使用者的列表。
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::select('select * from profile');

        foreach ($users as $elem) {
            echo "<h3>";
            foreach ($elem as $e) {
                echo "$e ";
            }
            echo "</h3>";
        }

        //return view('user.index', ['users' => $users]);
        echo "<h1>Hello World</h1>";
    }
}