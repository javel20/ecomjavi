<?php

namespace Ecomjavi;

use Illuminate\Database\Eloquent\Model;

class CarroUsuarioCompra extends Model
{
    protected $fillable = ["estado"];


    public function cantidadProductos(){
        return $this->id;
    }


    public static function buscarOCrearPorSessionId($carro_usuario_compra_id){

        if($carro_usuario_compra_id)
            return CarroUsuarioCompra::buscarPorSession($carro_usuario_compra_id);
        else
            return CarroUsuarioCompra::crearConSession();

    }

    public static function buscarPorSession($carro_usuario_compra_id){
        return CarroUsuarioCompra::find($carro_usuario_compra_id);
    }

    public static function crearConSession(){
        return CarroUsuarioCompra::create([

            "estado"=>"incompleto",

        ]);
    }
}
