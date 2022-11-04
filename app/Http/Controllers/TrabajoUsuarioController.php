<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TrabajoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $paginador = Trabajo::with("usuarios")->paginate(10);
        return $paginador;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Trabajo $trabajo, Usuario $usuario)
    {
        $trabajo->usuarios()->sync($usuario, false);
        return jsend_success(
            ['trabajo' => $trabajo, 'usuario' => $usuario]
        );
    }

    public function asignar_trabajo_usuario(Trabajo $trabajo, Usuario $usuario)
    {
        $trabajo->usuarios()->sync($usuario, false);
        return jsend_success(
            ['trabajo' => $trabajo, 'usuario' => $usuario]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
