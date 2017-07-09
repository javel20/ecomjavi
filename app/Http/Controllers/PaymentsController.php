<?php

namespace Ecomjavi\Http\Controllers;

use Illuminate\Http\Request;
use Ecomjavi\Http\Requests;

use Ecomjavi\CarroUsuarioCompra;
use Ecomjavi\PayPal;
use Ecomjavi\Orden;

class PaymentsController extends Controller
{
    public function store(Request $request){

        $carro_usuario_compra_id = \Session::get('carro_usuario_compra_id');

        $carro_usuario_compra = CarroUsuarioCompra::buscarOCrearPorSessionId($carro_usuario_compra_id);

        $paypal = new Paypal($carro_usuario_compra);    

        // dd($paypal->execute($request->paymentId,$request->PayerID));

        $response = $paypal->execute($request->paymentId,$request->PayerID);

        if($response->state == "approved"){
            $orden = Orden::crearRespuestaPaypal($response, $carro_usuario_compra);
            // dd($orden);
        }


        return view("carro_usuario_compras.completed",["carro_usuario_compra" => $carro_usuario_compra, "orden" => $orden]);

    }
}
