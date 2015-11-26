<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatieresPremieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieresPremieres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('nom');
            $table->string('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->integer('quantiteTotale');
            $table->integer('quantiteMinimum');
            $table->integer('quantiteLimite');
            $table->integer('quantiteReserve');
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
        Schema::drop('matieresPremieres');
    }
}
