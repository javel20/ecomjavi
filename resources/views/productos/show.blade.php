@extends('layouts.app')

@section('content')

<div class="container text-center">

    <div class="card product text-left">

        @if(Auth::check() && $producto->user_id == Auth::user()->id)
        
            <div class="absolute actions">
            
                <a href="{{url('/productos/'.$producto->id.'/edit')}}">
                
                    Editar

                </a>

               @include('productos.delete',['producto' => $producto])

            </div>
        
        @endif


        <h1>{{$producto->id}}</h1>
            <div class="row">
                <div class="col-sm-6 col-xs-12"></div>
                <div class="col-sm-6 col-xs-12">
                    <p><strong>Descripcion</strong></p>
                    
                    <p>{{$producto->descripcion}}</p>
                    <p>
                        @include("carro_usuario_compra_producto.form",["producto",$producto])
                    </p>
                </div>
                </div>
            </div>
    </div>

</div>

@endsection