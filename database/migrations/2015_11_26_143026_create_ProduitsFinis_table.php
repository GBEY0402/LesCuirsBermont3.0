<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsFinisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produitsFinis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('nom');
            $table->string('description')->nullable();
            $table->integer('quantite');
            $table->decimal('prix', 10, 2);
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
        Schema::drop('produitsFinis');
    }
}