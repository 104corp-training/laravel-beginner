<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CourseController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */

    public function index(Request $request)
    {
        return view(
            'course',
            [
                'records' => [
                    [
                        'id' => 1,
                        'text' => 'PHP 基礎課程',
                    ],
                    [
                        'id' => 2,
                        'text' => 'Laravel 程式設計',
                    ],
                    [
                        'id' => 3,
                        'text' => '良好的程式撰寫基礎',
                    ],
                    [
                        'id' => 4,
                        'text' => '設計模式基礎',
                    ],
                    [
                        'id' => 5,
                        'text' => 'Git 入門篇',
                    ],
                    [
                        'id' => 6,
                        'text' => 'Docker 入門篇',
                    ],
                    [
                        'id' => 7,
                        'text' => 'CI/CD 基礎概念',
                    ],
                    [
                        'id' => 8,
                        'text' => 'AWS雲端基礎概論',
                    ],
                    [
                        'id' => 9,
                        'text' => 'AWS Well Architected',
                    ],
                    [
                        'id' => 10,
                        'text' => 'AWS持續整合與部署CI/CD',
                    ],
                    [
                        'id' => 11,
                        'text' => '認識資料庫 L1 + SQL 語法',
                    ],
                    [
                        'id' => 12,
                        'text' => 'Search Engine',
                    ],
                    [
                        'id' => 13,
                        'text' => 'Web Application Security',
                    ],
                    [
                        'id' => 14,
                        'text' => '密碼學基本原理 + 弱點掃描概論',
                    ],
                ]
            ]
        );
    }
}
