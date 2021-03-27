<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_id');
            $table->string('name', 100);
            $table->string('description', 255);
            $table->text('outline');
            $table->timestamps();

            $table->index(['created_at']);
            $table->index(['name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course', function(Blueprint $table){
            $table->dropColumn('course_id');
        });
        
    }
}
