<?php

namespace Ecomjavi\Http\Controllers;

use Illuminate\Http\Request;
use Ecomjavi\Http\Requests;

use Ecomjavi\Producto;
use Illuminate\Support\Facades\Auth;



class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view("productos.index")->with([
            'productos' => $productos,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto;

        return view("productos.create")->with([
             'producto' => $producto, 

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            
            'titulo' => 'required|min:3|max:100|regex:/^[óáéíúña-z-\s]+$/i|unique:productos',  
            'precio'=> 'required',
            'descripcion' => 'max:100',

        ]); 

        $producto = new Producto;

        $producto->titulo = $request->titulo;
        $producto->precio = $request->precio;
        $producto->estado = $request->estado;
        $producto->descripcion = $request->descripcion;
        $producto->user_id = Auth::user()->id;

        if($producto->save()){
            return redirect("/productos");
        }else{
            return view("/productos.create",["producto" => $producto]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view("productos.show")->with([
           'producto' => $producto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('productos.edit')->with([
           'producto' => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            
            'titulo' => 'required|min:3|max:30|regex:/^[óáéíúña-z-\s]+$/i',  
            'precio'=> 'required',
            'descripcion' => 'max:100',

        ]); 

        $producto = Producto::find($id);

        $producto->titulo = $request->titulo;
        $producto->precio = $request->precio;
        $producto->estado = $request->estado;
        $producto->descripcion = $request->descripcion;
        $producto->user_id = Auth::user()->id;

        if($producto->save()){
            return redirect("/productos");
        }else{
            return view("/productos.edit",["producto" => $producto]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::Destroy($id);
        return redirect('/productos');
    }
}
