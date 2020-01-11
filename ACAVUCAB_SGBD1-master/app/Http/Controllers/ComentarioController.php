<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comentario;

class ComentarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id_tipo_cerveza,$correo)
    {
        $comentarios = DB::select(DB::raw("SELECT id_comentario, nombre,descripcion,fk_tipo_cerveza
        FROM comentario WHERE fk_tipo_cerveza = '$id_tipo_cerveza'"));
        $checkT = DB::select(DB::raw("SELECT fk_rol  from usuario WHERE email = '$correo'"));
        $rol = $checkT[0]->fk_rol;

        return view ('home.comentario')
                                        ->with('comentarios',$comentarios)
                                        ->with('id_tipo_cerveza',$id_tipo_cerveza)
                                        ->with('correo',$correo)
                                        ->with('rol',$rol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id_tipo_cerveza,$correo)
    {
        $comentarios = DB::select(DB::raw("SELECT id_comentario, nombre,descripcion,fk_tipo_cerveza
        FROM comentario WHERE fk_tipo_cerveza = '$id_tipo_cerveza'"));

        return view ('home.crearComentario')
                                            ->with('comentarios',$comentarios)
                                            ->with('id_tipo_cerveza',$id_tipo_cerveza)
                                            ->with('correo',$correo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $comentario = new Comentario();
        $comentario->nombre=$request->nombre;
        $comentario->descripcion=$request->descripcion;
        $comentario->fk_tipo_cerveza=$id;
        $comentario->save();
        return back();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy($idcomentario)
    {
        $comentario=Comentario::find($idcomentario);
        $comentario->delete();
        return back();
    }
}
