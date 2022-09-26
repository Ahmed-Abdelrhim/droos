<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTableLecturesFirstToLecturesSecondYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lectures_second_years', function (Blueprint $table) {
            $table->dropColumn('cover');
            $table->dropColumn('lecture');
            $table->string('lec')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lectures_second_years', function (Blueprint $table) {
            //
        });
    }
}