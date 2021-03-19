<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
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
        foreach ($fixture as $courseAll) {
            Course::create([
                'course_id' => $courseAll[0],
                'name' => $courseAll[1],
                'description' => $courseAll[2],
                'outline' => $courseAll[3],
            ]);

        }
    }

    //TODO: 1. seeder
    private function getTestFixture()
    {
        return [
            [ 'PHPbasic', 'PHP 基礎課程', 'A basic php course, including variable, class, function etc.', '成功學到PHP的很多東西，包括類的使用、繼承、多態等等' ],
            [ 'Laravel', 'Laravel 程式設計', 'Teaching about the best modern PHP frame', '學到框架的使用與api的創造基礎' ],
            [ 'CleanCode', '良好的程式撰寫基礎', 'How to code a everybody ok code', '學到如何撰寫不會被組員討厭的程式設計技巧、排版等等' ],
            [ 'DesignPattern', '設計模式基礎', 'How to solve the problem in various ways', '學到各種解決問題的辦法' ],
            [ 'Git', 'Git 入門篇', 'Version control software', '學到如何使用git做版本控制、共同開發、各種指令的使用等等' ],
            [ 'Docker', 'Docker 入門篇', 'A container-virtual-machine, lightweight, free, and with a cute whale when turning on', '學到如何在docker上面建造各類型環境並使用' ],
            [ 'CICD', 'CI/CD 基礎概念', 'Introduction of Continuous integrate/Continuous deploy', '學習到什麼是持續部署與持續整合，並成功在heroku與github上面部署網頁' ],
            [ 'AWS', 'AWS雲端基礎概論', 'a cloud technology', '還沒學到，不過快了' ],
            [ 'awsWellArchitected', 'AWS Well Architected', 'I tried hard to describe it, I did!', '沒學到又加加，應該也快了' ],
            [ 'CICDByAws', 'AWS持續整合與部署CI/CD', 'CICD by Azure Website service', '下禮拜就會了' ],
            [ 'S&SInformation', '資料儲存與資訊檢索', 'I am excited to learn it maybe', '這個東西麻，下禮拜會上喔' ],
            [ 'SQL', '認識資料庫 L1 + SQL 語法', 'Recognize database, teach the instruction like SELECT, WHERE, FROM etc.', '學習資料庫的原理，以及資料庫歷史與現在流行的資料庫' ],
            [ 'SearchEngine', 'Search Engine', 'Honest, I have no idea what it is', '下禮拜學習呦' ],
            [ 'WebApplicationSecurity', 'Web Application Security', 'How to prevent sql injection or something like that', '應該是學一些基礎防禦概念，包括怎麼寫不會有漏洞的方式等等' ],
            [ 'Cryptography', '密碼學基本原理 + 弱點掃描概論', 'basic encryption and decryption', '密碼學原理吧，加解密，明文密文學習等等' ],
        ];
    }
}
// $courseNameDict = [
//     'PHPbasic' => "A basic php course, including variable, class, function etc.",
//     'Laravel' => "Teaching about the best modern PHP frame ",
//     'CleanCode' => "How to code a everybody ok code",
//     'DesignPattern' => "How to solve the problem in various ways",
//     'Git' => "Version control software",
//     'Docker' => "A container-virtual-machine, lightweight, free, and with a cute whale when turning on",
//     'CICD' => "Introduction of Continuous integrate/Continuous deploy",
//     'SQL' => "Recognize database, teach the instruction like SELECT, WHERE, FROM etc.",
//     'AWS' => "a cloud technology",
//     'SearchEngine' => "Honest, I have no idea what it is",
//     'WebApplicationSecurity' => "How to prevent sql injection or something like that",
//     'Cryptography' => "basic encryption and decryption"
// ];
