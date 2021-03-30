<?php

use App\Models\CourseStudy;
use Illuminate\Database\Seeder;

class CourseStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $fixture = $this->getTestFixture();
        foreach ($fixture as $courseName) {
            CourseStudy::create([
                'name' => $courseName,
                'point' => $faker->numberBetween($min = 0, $max = 100),
                'content' => $faker->text,
                'outline' => $faker->text,
            ]);

        }
    }

    private function getTestFixture()
    {
        return [
            'PHP 基礎課程',
            'Laravel 程式設計',
            '良好的程式撰寫基礎',
            '設計模式基礎',
            'Git 入門篇',
            'Docker 入門篇',
            'CI/CD 基礎概念',
            'AWS雲端基礎概論',
            'AWS Well Architected',
            'AWS持續整合與部署CI/CD',
            '資料儲存與資訊檢索',
            '認識資料庫 L1 + SQL 語法',
            'Search Engine',
            'Web Application Security',
            '密碼學基本原理 + 弱點掃描概論',
        ];
    }
}
