<?php

namespace Ecomjavi\Http\Controllers;

use Illuminate\Http\Request;
use Ecomjavi\Http\Requests;

use Ecomjavi\CarroUsuarioCompra;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carro_usuario_compra_id = \Session::get('carro_usuario_compra_id');

        $carro = CarroUsuarioCompra::buscarOCrearPorSessionId($carro_usuario_compra_id);

        \Session::put("carro_usuario_compra_id", $carro->id);

        return view('home')->with([
            'carro' => $carro,
        ]);
    }
}
