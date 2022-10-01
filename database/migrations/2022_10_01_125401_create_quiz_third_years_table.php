<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizThirdYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_third_years', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('course_third_years')->onDelete('cascade');
            $table->integer('serial_number');
            $table->integer('week');
            $table->string('link');
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
        Schema::dropIfExists('quiz_third_years');
    }
}
