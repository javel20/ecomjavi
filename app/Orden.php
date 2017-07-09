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
        // dd($orderData);
        // dd($payer);
        
        $orderData["ciudad"] = $payer->payer_info->shipping_address->city;
        $orderData["estado_hogar"] = $payer->payer_info->shipping_address->state;
        $orderData["nombre_receptor"] = $payer->payer_info->shipping_address->recipient_name;
        $orderData["estado"] = $payer->status;
        $orderData["codigo_postal"] = $payer->payer_info->shipping_address->postal_code;
        $orderData["codigo_pais"] = $payer->payer_info->shipping_address->country_code;
        $orderData["direccion1"] = $payer->payer_info->shipping_address->line1;
        $orderData["email"] = $payer->payer_info->email;
        $orderData["total"] = $carro_usuario_compra->total();
        $orderData["carro_usuario_compra_id"] = $carro_usuario_compra->id;

        return Orden::create($orderData);
        
    }

}



