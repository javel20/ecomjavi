@extends("layouts.app")

@section("content")

    <div class="big-padding text-center blue-grey white-text">
        <h1>Productos</h1>
        
    </div>



    <div class="container">

        <table class="table table-bordered">
            <thead>
                <tr>

                    <td>Titulo</td>
                    <td>Precio</td>
                    <td>Estado</td>
                    <td>Descripcion</td>

                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->titulo}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->estado}}</td>
                    <td>{{$producto->descripcion}}</td>
                   
                    <td>
                        <a href="{{url('/productos/'.$producto->id.'/edit')}}">Editar</a>
                        @include('productos.delete',['producto' => $producto])
                    </td>
                    

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
</div>


@endsection