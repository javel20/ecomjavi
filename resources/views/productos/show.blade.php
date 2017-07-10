@extends('layouts.app')

@section('content')

<div class="container text-center">

    <div class="card product text-left">

        @include('productos.producto',["producto" => $producto])

    </div>

</div>

@endsection