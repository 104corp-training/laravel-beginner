<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class OperationController extends Controller
{
    private $_dictionary = [
        'git' => [
            'title' => 'GIT 入門篇',
            'description' => '從零開始的 GIT 基礎教學',
            'note' => 'https://app.104dc-dev.com/codimd/xWuFGDC3QVuiS9AXYYrXxQ?both',
            'resource' => 'https://gitbook.tw/',
        ],
        'php' => [
            'title' => 'PHP 基礎課程',
            'description' => '那些年我們一起學過的 PHP',
            'note' => '(none)',
            'resource' => '(none)',
        ],
        'l1_sql' => [
            'title' => '認識資料庫 L1 + SQL 語法',
            'description' => '一分鐘教會你資料庫',
            'note' => '(none)',
            'resource' => '(none)',
        ],
        'ci_cd' => [
            'title' => 'CI/CD 基礎概念',
            'description' => '第一次整合部署就上手',
            'note' => '(none)',
            'resource' => '(none)',
        ],
        'laravel' => [
            'title' => 'Laravel 程式設計',
            'description' => 'Laravel 聖經',
            'note' => 'https://app.104dc-dev.com/codimd/M9hnAvyCTMqLO0SfsWP2AQ?both',
            'resource' => '(none)',
        ],
        'docker' => [
            'title' => 'Docker 入門篇',
            'description' => '快樂學 Docker',
            'note' => 'https://104corp.github.io/docker-workshop/',
            'resource' => 'https://ithelp.ithome.com.tw/users/20102562/ironman/3746',
        ],
        'aws_cloud' => [
            'title' => 'AWS 雲端基礎概念',
            'description' => 'AWS 實戰 上集',
            'note' => '(none)',
            'resource' => '(none)',
        ],
        'password' => [
            'title' => '密碼學基本原理＋弱點掃描概論',
            'description' => 'Writing Code that Nobody Else Can Read',
            'note' => '(none)',
            'resource' => '(none)',
        ],
        'aws_well_arch' => [
            'title' => 'AWS Well Archiected',
            'description' => 'AWS 實戰 中集',
            'note' => '(none)',
            'resource' => '(none)',
        ],
        'was' => [
            'title' => 'Web Apllication Security',
            'description' => 'WPS 加密之旅',
            'note' => '(none)',
            'resource' => '(none)',
        ],
        'aws_cicd' => [
            'title' => 'AWS 持續整合與部署 CI/CD',
            'description' => 'AWS 實戰 下集',
            'note' => '(none)',
            'resource' => '(none)',
        ],
        'mode' => [
            'title' => '設計模式基礎',
            'description' => '好的模式帶你上天堂，不好的模式帶你住套房',
            'note' => '(none)',
            'resource' => '(none)',
        ],
        'engine' => [
            'title' => 'Search Engine',
            'description' => '讓資料不當個路癡',
            'note' => '(none)',
            'resource' => '(none)',
        ],
    ];
    /**
     * Use to get operation code and output the correct outout.
     * 
     * @param int $op_code
     * @return Response
     */
    public function show($op_code)
    {
        echo "Good to see U <3 <br>";
        echo "Ur op code is: $op_code. Enjoy it<br>";
        return view('operation_pot');
    }
}