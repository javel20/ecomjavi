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
    public function index(Request $request)
    {
        // dd($request->all());
        // $carro_usuario_compra = $request->carro_usuario_compra;

        $carro_usuario_compra_id = \Session::get('carro_usuario_compra_id');

        $carro_usuario_compra = CarroUsuarioCompra::buscarOCrearPorSessionId($carro_usuario_compra_id);
            // dd($carro);

        // $paypal = new PayPal($carro_usuario_compra);

        // $payment = $paypal->generate();

        // return redirect($payment->getApprovalLink());

        $productos = $carro_usuario_compra->productos()->get();

        $total = $carro_usuario_compra->total();

        return view("carro_usuario_compras.index",["productos" => $productos, "total" => $total]);
    }

    public function checkout(Request $request){

        // dd("asdsa");

        $carro_usuario_compra_id = \Session::get('carro_usuario_compra_id');

        $carro_usuario_compra = CarroUsuarioCompra::buscarOCrearPorSessionId($carro_usuario_compra_id);

        $paypal = new PayPal($carro_usuario_compra);

        $payment = $paypal->generate();

        return redirect($payment->getApprovalLink());

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
