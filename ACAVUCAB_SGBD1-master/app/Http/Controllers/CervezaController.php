<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cerveza;

class CervezaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id_tipo_cerveza,$correo)
    {
        $cervezas = DB::select(DB::raw("SELECT numero_cerveza, nombre,descripcion,costo,precio_venta,fk_tipo_cerveza,fk_oferta
        FROM cerveza WHERE fk_tipo_cerveza = '$id_tipo_cerveza'"));
        $checkT = DB::select(DB::raw("SELECT fk_rol  from usuario WHERE email = '$correo'"));
        $rol = $checkT[0]->fk_rol;

        return view ('home.cerveza')->with('cervezas',$cervezas)->with('id_tipo_cerveza',$id_tipo_cerveza)->with('correo',$correo)->with('rol',$rol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id_tipo_cerveza,$correo)
    {
        $cervezas = DB::select(DB::raw("SELECT numero_cerveza, nombre,descripcion,costo,precio_venta,fk_tipo_cerveza,fk_oferta
        FROM cerveza WHERE fk_tipo_cerveza = '$id_tipo_cerveza'"));

        return view ('home.crearCerveza')->with('cervezas',$cervezas)->with('id_tipo_cerveza',$id_tipo_cerveza)->with('correo',$correo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $cerveza = new Cerveza();
        $cerveza->nombre=$request->nombre;
        $cerveza->descripcion=$request->descripcion;
        $cerveza->costo=$request->costo;
        $cerveza->precio_venta=$request->precio_venta;
        $cerveza->fk_tipo_cerveza=$id;
        $cerveza->save();
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
    public function destroy($idcerveza)
    {
        $cerveza=Cerveza::find($idcerveza);
        $cerveza->delete();
        return back();
    }
}
