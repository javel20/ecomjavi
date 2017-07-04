<?php

namespace Ecomjavi;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    // public function carro_usuario_compraProductos(){

    //     return $this->hasMany('Ecomjavi\Carro_usuario_compraProducto');

    // }

    public function carros(){

        return $this->belongsToMany('Ecomjavi\CarroUsuarioCompra','carro_usuario_compra_productos');

    }



    public function paypalItem(){

        return \paypalPayment::item()->setName($this->titulo)
                                    ->setDescription($this->descripcion)
                                    ->setCurrency('USD')
                                    ->setQuantity(1)
                                    ->setPrice($this->precio / 100);

    }
    
}
