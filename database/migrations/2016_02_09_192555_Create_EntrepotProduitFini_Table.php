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
        Schema::create('EntrepotProduitFini', function (Blueprint $table) {
            $table->integer('produitsId')->unsigned();
            $table->foreign('produitsId')->references('id')->on('produitsFinis');
            $table->integer('entrepotsId')->unsigned();
            $table->foreign('entrepotsId')->references('id')->on('entrepot');
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
        Schema::drop('EntrepotProduitFini');
    }
}
