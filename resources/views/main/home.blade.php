@extends('layouts.app')

@section('title','Productos je')

@section('content')
    <div>

        @foreach($productos as $producto)
            @include("productos.producto",["producto" => $producto])
        @endforeach

    </div>

@endsection