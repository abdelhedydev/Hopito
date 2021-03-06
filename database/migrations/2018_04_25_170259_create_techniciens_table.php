<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechniciensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('techniciens', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom');
          $table->string('prenom');
          $table->string('telephone');
          $table->string('adrresse')->nullable();
          $table->integer('cin');
          $table->string('sexe');
          $table->date('naissance')->nullable();
          $table->date('date_debut')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('techniciens');
    }
}
