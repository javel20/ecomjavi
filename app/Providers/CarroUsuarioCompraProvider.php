<?php

namespace Ecomjavi\Providers;

use Illuminate\Support\ServiceProvider;
use Ecomjavi\CarroUsuarioCompra;

class CarroUsuarioCompraProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*", function($view){

            $carro_usuario_compra_id = \Session::get('carro_usuario_compra_id');


            $carro_usuario_compra = CarroUsuarioCompra::buscarOCrearPorSessionId($carro_usuario_compra_id);
            

            \Session::put("carro_usuario_compra_id", $carro_usuario_compra->id);

            $view->with("carro_usuario_compra", $carro_usuario_compra);

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
