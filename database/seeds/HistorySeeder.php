<?php

use App\History;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $range = range(1,16);
        array_walk($range, fn($num) => History::create([
            'course_id' => $num,
            'description' => "學習基礎內容",
            'course_date' => $faker->dateTimeBetween('-30 days', '-20 days')
        ]));

        $range = range(8,14);
        array_walk($range, fn($num) => History::create([
            'course_id' => $num,
            'description' => "學習進階內容",
            'course_date' => $faker->dateTimeBetween('-10 days')
        ]));

        $range = range(1,9);
        array_walk($range, fn($num) => History::create([
            'course_id' => $num,
            'description' => "上機實作",
            'course_date' => $faker->dateTimeBetween('-19 days', '-11 days')
        ]));
    }

}
