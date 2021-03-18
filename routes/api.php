<?php

use App\Exceptions\APIException;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/profile/info', function () {
    return ['time' => Carbon\Carbon::now()];
});

Route::get('/courses', function () {
    return [
        [
            'id' => 1,
            'text' => 'PHP 基礎課程',
            'introduction' => '對於PHP的基礎課程教學',
        ],
        [
            'id' => 2,
            'text' => 'Laravel 程式設計',
            'introduction' => '對於Laravel的基礎課程教學',
        ],
        [
            'id' => 3,
            'text' => '良好的程式撰寫基礎',
            'introduction' => '對於良好的程式撰寫基礎課程教學',
        ],
        [
            'id' => 4,
            'text' => '設計模式基礎',
            'introduction' => '對於設計模式基礎的基礎課程教學',
        ],
        [
            'id' => 5,
            'text' => 'Git 入門篇',
            'introduction' => '對於Git 入門篇的基礎課程教學',
        ],
        [
            'id' => 6,
            'text' => 'Docker 入門篇',
            'introduction' => '對於Docker 入門篇的基礎課程教學',
        ],
        [
            'id' => 7,
            'text' => 'CI/CD 基礎概念',
            'introduction' => '對於CI/CD的基礎概念教學',
        ],
        [
            'id' => 8,
            'text' => 'AWS雲端基礎概論',
            'introduction' => '對於AWS雲端基礎概論的基礎教學',
        ],
        [
            'id' => 9,
            'text' => 'AWS Well Architected',
            'introduction' => '對於AWS Well Architected的基礎教學',

        ],
        [
            'id' => 10,
            'text' => 'AWS持續整合與部署CI/CD',
            'introduction' => '對於AWS持續整合與部署CI/CD的基礎教學',

        ],
        [
            'id' => 11,
            'text' => '認識資料庫 L1 + SQL 語法',
            'introduction' => '對於認識資料庫 L1 + SQL 語法的教學',

        ],
        [
            'id' => 12,
            'text' => 'Search Engine',
            'introduction' => '對於Search Engine的教學',
        ],
        [
            'id' => 13,
            'text' => 'Web Application Security',
            'introduction' => '對於Web Application Security的教學',
        ],
        [
            'id' => 14,
            'text' => '密碼學基本原理 + 弱點掃描概論',
            'introduction' => '對於密碼學基本原理 + 弱點掃描概論的教學',
        ],
            ];
});

Route::get('/course/{id}', function($id){
    $courses = [
        [
            'id' => 1,
            'text' => 'PHP 基礎課程',
            'introduction' => '對於PHP的基礎課程教學',
        ],
        [
            'id' => 2,
            'text' => 'Laravel 程式設計',
            'introduction' => '對於Laravel的基礎課程教學',
        ],
        [
            'id' => 3,
            'text' => '良好的程式撰寫基礎',
            'introduction' => '對於良好的程式撰寫基礎課程教學',
        ],
        [
            'id' => 4,
            'text' => '設計模式基礎',
            'introduction' => '對於設計模式基礎的基礎課程教學',
        ],
        [
            'id' => 5,
            'text' => 'Git 入門篇',
            'introduction' => '對於Git 入門篇的基礎課程教學',
        ],
        [
            'id' => 6,
            'text' => 'Docker 入門篇',
            'introduction' => '對於Docker 入門篇的基礎課程教學',
        ],
        [
            'id' => 7,
            'text' => 'CI/CD 基礎概念',
            'introduction' => '對於CI/CD的基礎概念教學',
        ],
        [
            'id' => 8,
            'text' => 'AWS雲端基礎概論',
            'introduction' => '對於AWS雲端基礎概論的基礎教學',
        ],
        [
            'id' => 9,
            'text' => 'AWS Well Architected',
            'introduction' => '對於AWS Well Architected的基礎教學',

        ],
        [
            'id' => 10,
            'text' => 'AWS持續整合與部署CI/CD',
            'introduction' => '對於AWS持續整合與部署CI/CD的基礎教學',

        ],
        [
            'id' => 11,
            'text' => '認識資料庫 L1 + SQL 語法',
            'introduction' => '對於認識資料庫 L1 + SQL 語法的教學',

        ],
        [
            'id' => 12,
            'text' => 'Search Engine',
            'introduction' => '對於Search Engine的教學',
        ],
        [
            'id' => 13,
            'text' => 'Web Application Security',
            'introduction' => '對於Web Application Security的教學',
        ],
        [
            'id' => 14,
            'text' => '密碼學基本原理 + 弱點掃描概論',
            'introduction' => '對於密碼學基本原理 + 弱點掃描概論的教學',
        ],
    ];

    $id = $id -1;
    if ( $id >= 0 && $id < count($courses) ) {
        $result = $courses[$id];
    } else {
        $result = '無此資料';
    }
    return $result;
});
