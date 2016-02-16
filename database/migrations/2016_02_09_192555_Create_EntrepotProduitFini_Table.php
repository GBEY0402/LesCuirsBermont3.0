<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrepotProduitFiniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('Entrepot_Produit_Fini', function (Blueprint $table) {
            $table->integer('entrepot_id')->unsigned();
            $table->foreign('entrepot_id')->references('id')->on('entrepot');
            $table->integer('produit_fini_id')->unsigned();
            $table->foreign('produit_fini_id')->references('id')->on('produitsFinis');
            $table->integer('pointure');
            $table->integer('quantite');
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Entrepot_Produit_Fini');
    }
}
