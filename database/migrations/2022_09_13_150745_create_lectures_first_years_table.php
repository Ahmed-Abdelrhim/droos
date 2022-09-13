<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesFirstYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures_first_years', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cover');
            $table->unsignedInteger('serial_number');
            $table->foreign('serial_number')->references('id')->on('course_first_years')->onDelete('cascade');
            $table->tinyInteger('week');
            $table->string('lecture');
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
        Schema::dropIfExists('lectures_first_years');
    }
}
