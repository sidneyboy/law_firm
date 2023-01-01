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
        Schema::table('Case_details_attachments', function (Blueprint $table) {
            $table->Integer('case_details_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Case_details_attachments', function (Blueprint $table) {
            $table->dropColumn('case_details_id');
        });
    }
};
