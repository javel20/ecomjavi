<?php

namespace Ecomjavi;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = ['nombre_receptor','linea1','linea2','ciudad','codigo_pais','estado','codigo_postal','email','carro_usuario_compra_id','estado','total','numero_guia'];

    public function address(){
        return "$this->linea1 $this->linea2";
    }

    public static function crearRespuestaPaypal($response, $carro_usuario_compra){

        $payer = $response->payer;
        $orderData = (array) $payer->payer_info->shipping_adderss;
        $orderData = $orderData[Key($orderData)];

        $orderData["email"] = $paver->paver_info->email;
        $orderData["total"] = $carro_usuario_compra->total();
        $orderData["carro_compra_usuario_id"] = $carro_compra_usuario->id;

        return Order::create($orderData);
        
    }

}



