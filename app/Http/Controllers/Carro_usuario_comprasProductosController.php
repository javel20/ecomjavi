<?php

namespace Ecomjavi\Http\Controllers;

use Illuminate\Http\Request;

use Ecomjavi\Carro_usuario_compraProducto;
use Ecomjavi\CarroUsuarioCompra;

class Carro_usuario_comprasProductosController extends Controller
{

    public function store(Request $request)
    {
        dd("sdasd");
        $carro_usuario_compra_id = \Session::get('carro_usuario_compra_id');

        $carro = CarroUsuarioCompra::buscarOCrearPorSessionId($carro_usuario_compra_id);

        $response = Carro_usuario_compraProducto::create([
            "carro_usuario_compra_id" =>  $carro_usuario_compra->id,
            "producto_id" => $request->producto_id,
        ]);
        // dd($response);
        if(false){
            return redirect('/carrito');
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        //
    }
}
