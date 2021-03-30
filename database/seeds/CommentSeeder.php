<?php

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 20; $i++ ) {
            Comment::create([
                'id' => $i ,
                'edit_id' => $faker->numberBetween($min = 1, $max = 10),
                'comment_id' => $faker->numberBetween($min = 1, $max = 15),
                'text' => $faker->text,
            ]);
        }
    }
}
