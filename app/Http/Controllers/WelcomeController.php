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
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => 'PHP 基礎課程',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => '認識資料庫 L1 + SQL語法',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => 'CI/CD 基礎概念',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => 'Laraval 程式設計',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => 'Docker 入門篇',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => 'AWS 雲端基礎概念',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => '密碼學基本原理＋弱點掃描概論',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => 'AWS Well Archiected',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => 'Web Apllication Security',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => 'AWS 持續整合與部署 CI/CD',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => '設計模式基礎',
                        'url' => 'https://youtu.be/072tU1tamd0',
                    ],
                    [
                        'key' => 'Search Engine',
                        'url' => 'https://youtu.be/072tU1tamd0',
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
