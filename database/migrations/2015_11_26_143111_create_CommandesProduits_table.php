<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandesProduits', function (Blueprint $table) {
            $table->integer('commandesId')->unsigned();
            $table->foreign('commandesId')->references('id')->on('commandes');
            $table->integer('produitsId')->unsigned();
            $table->foreign('produitsId')->references('id')->on('produitsFinis');
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
        Schema::drop('commandesProduits');
    }
}
