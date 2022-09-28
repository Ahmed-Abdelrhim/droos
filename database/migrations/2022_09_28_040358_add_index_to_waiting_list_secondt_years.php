<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToWaitingListSecondtYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('waiting_list_second_years', function (Blueprint $table) {
            $table->unsignedInteger('course_id')->after('student_id');
            $table->foreign('course_id')->references('id')->on('course_second_years')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('waiting_list_secondt_years', function (Blueprint $table) {
            //
        });
    }
}
