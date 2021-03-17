<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClassController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view(
            'class',
            [
                'records' => [
                    [
                        'id' => 'PHP 基礎課程',
                        'text' => 'PHP',
                    ],
                    [
                        'id' => 'Laravel 程式設計',
                        'text' => 'Laravel',
                    ],
                    [
                        'id' => '良好的程式撰寫基礎',
                        'text' => 'good code',
                    ],
                    [
                        'id' => '設計模式基礎',
                        'text' => 'design',
                    ],
                    [
                        'id' => 'Git 入門篇',
                        'text' => 'git',
                    ],
                    [
                        'id' => 'Docker 入門篇',
                        'text' => 'docker',
                    ],
                    [
                        'id' => 'CI/CD 基礎概念',
                        'text' => 'CI/CD',
                    ],
                    [
                        'id' => 'AWS雲端基礎概論',
                        'text' => 'AWS',
                    ],
                    [
                        'id' => 'AWS Well Architected',
                        'text' => 'AWS Well Architected',
                    ],
                    [
                        'id' => 'AWS持續整合與部署CI/CD
                        ',
                        'text' => 'AWS CI/CD',
                    ],
                    [
                        'id' => '認識資料庫 L1 + SQL 語法',
                        'text' => 'DB',
                    ],
                    [
                        'id' => 'Search Engine',
                        'text' => 'Search Engine',
                    ],
                    [
                        'id' => 'Web Application Security',
                        'text' => 'Web app',
                    ],
                    [
                        'id' => '密碼學基本原理 + 弱點掃描概論',
                        'text' => 'encrption',
                    ],
                ],
            ],
        );
    }
}
