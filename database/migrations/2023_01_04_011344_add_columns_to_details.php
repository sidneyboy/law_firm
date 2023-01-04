<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Cases_details', function (Blueprint $table) {
            $table->string('date_of_hearing')->nullable();
            $table->string('time_of_hearing')->nullable();
            $table->string('nature_of_hearing')->nullable();
            $table->string('plea')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Cases_details', function (Blueprint $table) {
            $table->dropColumn('date_of_hearing')->nullable();
            $table->dropColumn('time_of_hearing')->nullable();
            $table->dropColumn('nature_of_hearing')->nullable();
            $table->dropColumn('plea')->nullable();
        });
    }
};
