<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id')->sizeof(8);
            $table->integer('clientsId')->unsigned();
            $table->foreign('clientsId')->references('id')->on('clients');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('etat');
            $table->string('commentaire')->nullable();
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
        Schema::drop('commandes');
    }
}
