@if(Auth::check() && $producto->user_id == Auth::user()->id)
        
            <div class="container absolute actions">
            
                <a href="{{url('/productos/'.$producto->id.'/edit')}}">
                
                    Editar

                </a>

               @include('productos.delete',['producto' => $producto])

            </div>
        
        @endif


        <h1>{{$producto->id}}</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <p><strong>Descripcion</strong></p>
                    
                    <p>{{$producto->descripcion}}</p>
                    <p>
                        @include("carro_usuario_compra_productos.form",["producto" => $producto])
                    </p>
                </div>
            </div>
        </div>