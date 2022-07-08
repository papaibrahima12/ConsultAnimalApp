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
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('animals_id')->unsigned();
            $table->foreign('animals_id')->references('id')->on('animals');

            $table->integer('vetos_id')->unsigned();
            $table->foreign('vetos_id')->references('id')->on('vetos');

            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users' );

            $table->text('libelle');
            $table->text('constat');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultations');
    }
};
