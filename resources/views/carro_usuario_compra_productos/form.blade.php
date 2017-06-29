
{!! Form::open(['url' => '/carro_usuario_compra_productos', 'method' => 'POST', "class" => "inline-block" ]) !!}

    <input type="hidden" name="producto_id" value="{{$producto->id}}"></imput>
    <input type="submit" value="Agregar el carrito" class="btn btn-info"></imput>

{!! Form::close() !!}