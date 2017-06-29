<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarroUsuarioComprasProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carro_usuario_compra_productos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('producto_id')->unsigned();
            $table->integer('carro_usuario_compra_id')->unsigned();
            
            $table->foreign('producto_id')->references("id")->on("productos");
            $table->foreign('carro_usuario_compra_id')->references("id")->on("carro_usuario_compras");

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
        Schema::dropIfExists('carro_usuario_compras');
    }
}
