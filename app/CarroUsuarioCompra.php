<?php

namespace Ecomjavi;

use Illuminate\Database\Eloquent\Model;

class CarroUsuarioCompra extends Model
{
    protected $fillable = ["estado"];

    public function carro_usuario_compraProductos(){

        return $this->hasMany('Ecomjavi\Carro_usuario_compraProducto');

    }

    public function productos(){
        
        return $this->belongsToMany('Ecomjavi\Producto','carro_usuario_compra_productos');

    }


    public function cantidadProductos(){
        return $this->productos()->count();
    }

    public function total(){
        return $this->productos()->sum("precio");
    }

    public function totalUSD(){

         return $this->productos()->sum("precio") / 100;
  
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
