@extends("layouts.app")

@section("content")

    <div class="big-padding text-center blue-grey white-text">
        <h1>Productos</h1>
        
    </div>



    <div class="table-responsive">

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
                @foreach($productos as $prod)
                <tr>
                    <td>{{$prod->titulo}}</td>
                    <td>{{$prod->precio}}</td>
                    <td>{{$prod->estado}}</td>
                    <td>{{$prod->descripcion}}</td>
                   

                    

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
</div>


@endsection