<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPatientId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('r_d_v_s', function (Blueprint $table) {
          $table->integer('patient_id')->unsigned()->after('id');
         $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('r_d_v_s', function (Blueprint $table) {
          $table->dropForeign(['patient_id']);
         $table->dropColumn('patient_id');
        });
    }
}
