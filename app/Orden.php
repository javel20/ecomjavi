<?php

namespace Ecomjavi;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = ['nombre_receptor','direccion1','direccion2','ciudad','codigo_pais','estado_hogar','codigo_postal','email','carro_usuario_compra_id','estado','total','numero_guia'];

    // public function address(){
    //     return "$this->linea1 $this->linea2";
    // }

    public static function crearRespuestaPaypal($response, $carro_usuario_compra){

        $payer = $response->payer;
        $orderData = (array) $payer->payer_info->shipping_address;
        $orderData = $orderData[Key($orderData)];

        $orderData["email"] = $payer->payer_info->email;
        $orderData["total"] = $carro_usuario_compra->total();
        $orderData["carro_usuario_compra_id"] = $carro_usuario_compra->id;

        return Orden::create($orderData);
        
    }

}



