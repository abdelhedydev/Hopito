<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoulumnRdvId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
          $table->integer('rdv_id')->unsigned()->after('id');
         $table->foreign('rdv_id')->references('id')->on('r_d_v');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
          $table->dropForeign(['rdv_id']);
         $table->dropColumn('rdv_id');
        });
    }
}
