<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToLecturesThirdYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lectures_third_years', function (Blueprint $table) {
            $table->unsignedInteger('course_id')->after('id');
            $table->foreign('course_id')->references('id')->on('course_third_years')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lectures_third_years', function (Blueprint $table) {
            //
        });
    }
}
