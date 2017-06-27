@extends("layouts.app")

@section("content")

    <div class="container col-sm-9 col-md-9">
    
        <h1>Editar Producto</h1>

            @include('productos.form',['producto'=>$producto, 'url' => '/productos/'.$producto->id, 'method' => 'PATCH'])

    </div>

@endsection