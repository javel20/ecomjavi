
{!!Form::open(['url' => $url, 'method' => $method])!!}

            <div class="form-group col-md-6">
            <label>Titulo:</label>
                {{Form::text('titulo',$producto->titulo,['class' => 'form-control', 'placeholder'=>'titulo','maxlength'=>'100'])}}
                
                @if($errors->has('titulo'))
                    <span style='color:red;'>{{$errors->first('titulo')}}</span>
                @endif
                <br>
            </div>

            <div class="form-group col-md-6">
            <label>Descripcion:</label>
                {{Form::text('descripcion',$producto->descripcion,['class' => 'form-control', 'placeholder'=>'Descripcions','maxlength'=>'60'])}}
                
                @if($errors->has('descripcion'))
                    <span style='color:red;'>{{$errors->first('descripcion')}}</span>
                @endif
                <br>
            </div>


            <div class="form-group col-md-6">
            <label>Precio</label>
                {{Form::number('precio',$producto->precio,['class' => 'form-control', 'placeholder'=>'precio','maxlength'=>'10'])}}
                
                @if($errors->has('precio'))
                    <span style='color:red;'>{{$errors->first('precio')}}</span>
                @endif
                <br>
            </div>




            <div class="form-group col-md-6">
            <label>Estado</label>
                <select class="form-control" name="estado" id="estado" value={{$producto->estado}}>
                    <option value="">--seleccionar--</option>
                    <option value="Habilitado" <?php echo ($producto->estado=="Habilitado" ? 'selected="selected"' : '');?>>Habilitado</option>
                    <option value="Escaso" <?php echo ($producto->estado=="Escaso" ? 'selected="selected"' : '');?>>Escaso</option>
                    <option value="Retirado" <?php echo ($producto->estado=="Retirado" ? 'selected="selected"' : '');?>>Retirado</option>
                </select>

                @if($errors->has('estado'))
                    <span style='color:red;'>{{$errors->first('estado')}}</span>
                @endif
                <br>
            </div>


            

            <div class="col-md-12 form-group text-right">
                <div class="form-group text-right">
                    <a href="{{url('/productos')}}">Regresar al listado de Productoes</a>
                    <input type="submit" value="Enviar" class="btn btn-success">
                </div>
            </div>

        {!! Form::close() !!}