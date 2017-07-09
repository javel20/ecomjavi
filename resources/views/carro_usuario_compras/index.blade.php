@extends("layouts.app")

@section("content")

<div class="">

    <h1>Tu carrito de compras</h1>

</div>

<div class="container">

    <table class="table table-bordered">
    
        <thead>
        
            <tr>
                <td>Producto</td>
                <td>Precio</td>
            </tr>
        
        </thead>
        <tbody>
        
            @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->titulo}}</td>
                    <td>{{$producto->precio}}</td>
                </tr>
            @endforeach

            <tr>
                <td>Total</td>
                <td>{{$total}}</td>
            </tr>

        </tbody>

    
    </table>
    
        <div class="text-right">
            @include('carro_usuario_compras.form')
        </div>

</div>

@endsection