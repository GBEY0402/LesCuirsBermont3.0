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
        Schema::create('commande_produit_fini', function (Blueprint $table) {
            $table->integer('commande_Id')->unsigned();
            $table->foreign('commande_Id')->references('id')->on('commandes');
            $table->integer('produit_fini_Id')->unsigned();
            $table->foreign('produit_fini_Id')->references('id')->on('produitsFinis');
            $table->integer('pointure');
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
        Schema::drop('commande_Produit_fini');
    }
}
