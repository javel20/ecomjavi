<?php

namespace Ecomjavi\Http\Controllers;

use Illuminate\Http\Request;
use Ecomjavi\Http\Requests;

use Ecomjavi\CarroUsuarioCompra;
use Ecomjavi\PayPal;

class PaymentsController extends Controller
{
    public function store(Request $request){

        $carro_usuario_compra_id = \Session::get('carro_usuario_compra_id');

        $carro = CarroUsuarioCompra::buscarOCrearPorSessionId($carro_usuario_compra_id);

        $paypal = new Paypal($carro_usuario_compra);

        dd($paypal->execute($request->paymentId,$request->PayerID));

    }
}
