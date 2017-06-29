<?php

namespace Ecomjavi;

use Illuminate\Database\Eloquent\Model;

class Carro_usuario_compraProducto extends Model
{
    protected $fillable = ["producto_id", "carro_usuario_compra_id"];
}
