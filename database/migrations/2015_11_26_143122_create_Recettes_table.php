<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->integer('produitsFinisId')->unsigned();
            $table->foreign('produitsFinisId')->references('id')->on('produitsFinis');
            $table->integer('matieresPremieresId')->unsigned();
            $table->foreign('matieresPremieresId')->references('id')->on('matieresPremieres');
            $table->integer('quantite');
            $table->timestamps('create_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recettes');
    }
}
