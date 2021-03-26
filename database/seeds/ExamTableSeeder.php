<?php

use Illuminate\Database\Seeder;

class ExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 7; $i++ ) {
            $fakerDatetime =  $faker->dateTimeBetween('-30 years', 'now');
            DB::table('exam')->insert([
                'id' => $i,
                'student_id' => $i,
                'course_id' => rand(1, 15),
                'exam_id' => 1,
                'exam_score' => rand(0, 100),
                'created_at' => $fakerDatetime,
                'updated_at' => $fakerDatetime,
            ]);
        }
    }
}
