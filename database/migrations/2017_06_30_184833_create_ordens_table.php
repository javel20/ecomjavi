<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carro_usuario_compra_id')->unsigned();
            $table->foreign('carro_usuario_compra_id')->references('id')->on('carro_usuario_compras');
            $table->string('linea1');
            $table->string('linea2')->nullable(true);
            $table->string('ciudad');
            $table->string('codigo_postal');
            $table->string('codigo_pais');
            $table->string('estado');
            $table->string('nombre_receptor');
            $table->string('email');
            $table->string('estado')->default("creado");
            $table->string('numero_guia')->nullable(true);
            $table->integer('total');

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
        Schema::dropIfExists('ordens');
    }
}
