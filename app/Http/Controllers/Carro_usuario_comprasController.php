<?php

namespace Ecomjavi\Http\Controllers;

use Illuminate\Http\Request;
use Ecomjavi\Http\Requests;

use Ecomjavi\CarroUsuarioCompra;
use Ecomjavi\PayPal;
use Ecomjavi\Producto;

class Carro_usuario_comprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carro_usuario_compra_id = \Session::get('carro_usuario_compra_id');

        $carro = CarroUsuarioCompra::buscarOCrearPorSessionId($carro_usuario_compra_id);
            // dd($carro);

        // $paypal = new PayPal($carro);

        // $payment = $paypal->generate();

        // return redirect($payment->getApprovalLink());

        $productos = $carro->productos()->get();

        $total = $carro->total();

        return view("carro_usuario_compras.index",["productos" => $productos, "total" => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
