<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_exam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->unsigned()->default(0)->comment('學生id');
            $table->integer('course_id')->unsigned()->default(0)->comment('課程id');
            $table->integer('course_exam_id')->unsigned()->default(0)->comment('考試id');
            $table->integer('course_exam_score')->unsigned()->default(0)->comment('考試成績');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_exam');
    }
}
