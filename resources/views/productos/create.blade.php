@extends("layouts.app")

@section("content")

    <div class="container col-sm-9 col-md-9">
    
        <h1>Nuevo Producto</h1>

            @include('productos.form',['producto'=>$producto, 'url' => '/productos', 'method' => 'POST'])    
    
    </div>

@endsection