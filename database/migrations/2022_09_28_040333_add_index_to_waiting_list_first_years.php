<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToWaitingListFirstYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('waiting_list_first_years', function (Blueprint $table) {
            $table->unsignedInteger('course_id')->after('student_id');
            $table->foreign('course_id')->references('id')->on('course_first_years')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('waiting_list_first_years', function (Blueprint $table) {
            //
        });
    }
}
