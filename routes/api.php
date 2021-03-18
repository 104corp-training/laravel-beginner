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
Route::get('Class', 'ClassController@index');
/*Route::get('/class', function () {
    return view(
        'class',
        [
            'records' => [
                [
                    'id' => 'PHP 基礎課程',
                    'text' => 'https://zh.wikipedia.org/wiki/PHP',
                    'name' => 'PHP'
                ],
                [
                    'id' => 'Laravel 程式設計',
                    'text' => 'https://zh.wikipedia.org/wiki/Laravel',
                    'name' => 'Laravel'
                ],
                [
                    'id' => '良好的程式撰寫基礎',
                    'text' => 'https://zh.wikipedia.org/wiki/Clean_Code',
                    'name' => 'Clean code'
                ],
                [
                    'id' => '設計模式基礎',
                    'text' => 'https://zh.wikipedia.org/wiki/%E8%AE%BE%E8%AE%A1%E6%A8%A1%E5%BC%8F_(%E8%AE%A1%E7%AE%97%E6%9C%BA)',
                    'name' => 'design model'
                ],
                [
                    'id' => 'Git 入門篇',
                    'text' => 'https://zh.wikipedia.org/wiki/Git',
                    'name' => 'Git'
                ],
                [
                    'id' => 'Docker 入門篇',
                    'text' => 'https://zh.wikipedia.org/wiki/Docker',
                    'name' => 'Docker'
                ],
                [
                    'id' => 'CI/CD 基礎概念',
                    'text' => 'https://zh.wikipedia.org/wiki/CI/CD',
                    'name' => 'CI/CD'
                ],
                [
                    'id' => 'AWS雲端基礎概論',
                    'text' => 'https://aws.amazon.com/tw/',
                    'name' => 'AWS'
                ],
                [
                    'id' => 'AWS Well Architected',
                    'text' => 'https://aws.amazon.com/tw/',
                    'name' => 'AWS Well Architected'
                ],
                [
                    'id' => 'AWS持續整合與部署CI/CD',
                    'text' => 'https://aws.amazon.com/tw/',
                    'name' => 'AWS CI/CD'
                ],
                [
                    'id' => '認識資料庫 L1 + SQL 語法',
                    'text' => 'https://zh.wikipedia.org/wiki/%E6%95%B0%E6%8D%AE%E5%BA%93',
                    'name' => 'DB'
                ],
                [
                    'id' => 'Search Engine',
                    'text' => 'https://zh.wikipedia.org/wiki/%E6%90%9C%E7%B4%A2%E5%BC%95%E6%93%8E',
                    'name' => 'Search Engine'
                ],
                [
                    'id' => 'Web Application Security',
                    'text' => 'https://en.wikipedia.org/wiki/Web_application_security',
                    'name' => 'Web App Security'
                ],
                [
                    'id' => '密碼學基本原理 + 弱點掃描概論',
                    'text' => 'https://en.wikipedia.org/wiki/Cryptography',
                    'name' => 'Crytography'
                ],
            ],
        ],
    );
});*/
