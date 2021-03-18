<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view(
            'welcome',
            [
                'subjects' => [
                    [
                        'key' => 'Git 入門篇',
                        'url' => '/operation/git',
                    ],
                    [
                        'key' => 'PHP 基礎課程',
                        'url' => '/operation/php',
                    ],
                    [
                        'key' => '認識資料庫 L1 + SQL語法',
                        'url' => '/operation/l1_sql',
                    ],
                    [
                        'key' => 'CI/CD 基礎概念',
                        'url' => '/operation/ci_cd',
                    ],
                    [
                        'key' => 'Laraval 程式設計',
                        'url' => '/operation/laravel',
                    ],
                    [
                        'key' => 'Docker 入門篇',
                        'url' => '/operation/docker',
                    ],
                    [
                        'key' => 'AWS 雲端基礎概念',
                        'url' => '/operation/aws_cloud',
                    ],
                    [
                        'key' => '密碼學基本原理＋弱點掃描概論',
                        'url' => '/operation/password',
                    ],
                    [
                        'key' => 'AWS Well Archiected',
                        'url' => '/operation/aws_well_arch',
                    ],
                    [
                        'key' => 'Web Apllication Security',
                        'url' => '/operation/was',
                    ],
                    [
                        'key' => 'AWS 持續整合與部署 CI/CD',
                        'url' => '/operation/aws_cicd',
                    ],
                    [
                        'key' => '設計模式基礎',
                        'url' => '/operation/mode',
                    ],
                    [
                        'key' => 'Search Engine',
                        'url' => '/operation/engine',
                    ],

                ],
            ]
        );
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
