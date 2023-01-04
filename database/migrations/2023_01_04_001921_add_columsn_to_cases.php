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
        Schema::table('Cases', function (Blueprint $table) {
            $table->string('court')->nullable();
            $table->string('action')->nullable();
            $table->string('docket_no')->nullable();
            $table->string('order')->nullable();
            $table->string('date_of_order')->nullable();
            $table->string('presiding_judge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Cases', function (Blueprint $table) {
            $table->dropColumn('court')->nullable();
            $table->dropColumn('action')->nullable();
            $table->dropColumn('docket_no')->nullable();
            $table->dropColumn('order')->nullable();
            $table->dropColumn('action')->nullable();
            $table->dropColumn('date_of_order')->nullable();
            $table->dropColumn('presiding_judge')->nullable();
        });
    }
};
