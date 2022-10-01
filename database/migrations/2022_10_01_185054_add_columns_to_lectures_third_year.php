<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToLecturesThirdYear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lectures_third_years', function (Blueprint $table) {
            $table->string('homework')->nullable()->after('lec');
            $table->string('quiz')->nullable()->after('homework');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lectures_third_year', function (Blueprint $table) {
            //
        });
    }
}
