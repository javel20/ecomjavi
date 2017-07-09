@extends("layouts.app")

@section("content")

<header class="container">
    <h1>Compra completada</h1>
</header>

<div class = "container">

    <div class="">
    
        <h3>Tu pago fue procesado <span>{{$orden->estado}}</span></h3>
    
    </div>

</div>

@endsection