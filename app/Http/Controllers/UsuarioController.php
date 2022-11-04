<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // localhost:8000/api/usuarios?page=2

        // return 'Hola mundo index';
        // return Usuario::all();
        
        $paginador = Usuario::paginate(10);
        


        // return $paginador;
        // return $paginador->items();
        // return response()->json($paginador);
        
        // return response()->json([
        //     'status' => 'success',
        //     'data' => $paginador->items(),
        //     'total' => $paginador->total(),
        // ]);

        // return response()->json([
        //     "status" => "success",
        //     "data" => [
        //         "usuarios" => $paginador->items(),
        //         "total" => $paginador->total()
        //     ],
        // ]);

        return jsend_success([
            "usuarios" => $paginador->items(),
            "total" => $paginador->total(),
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
        // return 'Hola mundo store';
        // return $request; 
        
        // $usuario = new Usuario();
        // $usuario->nombre = $request->nombre;
        // $usuario->edad = $request->edad;
        // $usuario->save()
        // return $usuario;
        

        return Usuario::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        // return 'Hola mundo show';
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        // return 'Hola mundo update';
        // return $request;
        
        // $usuario->nombre = $request->nombre;
        // $usuario->edad = $request->edad;
        // $usuario->save();

        $usuario->update($request->all());
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        // return 'Hola mundo destroy';
        $usuario->delete();
        // return $usuario;
    }

    // public function destroy(Usuario $usuario, Request $request)
    // {
    //     return 'Hola mundo destroy';
    // }

    public function agregarMascota(Request $request, Usuario $usuario){
        $mascota = $usuario->mascotas()->create($request->all());
        return $mascota;
    }

    public function mascotas(Usuario $usuario){
        return $usuario->mascotas;
        // return 
    }

}
