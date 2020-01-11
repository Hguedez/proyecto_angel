<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;
use Illuminate\Support\Facades\DB;
class HorarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id_evento,$id_horario,$correo)
    {   
        $horarios = DB::select( DB::raw("SELECT id_horario,dia,hora_inicio,hora_fin
        from horario 
        WHERE dia is not null"
        ));
        $checkT = DB::select(DB::raw("SELECT fk_rol  from usuario WHERE email = '$correo'"));
        $rol = $checkT[0]->fk_rol;

        return view('home.horario')->with('horarios', $horarios)->with('id_evento', $id_evento)->with('correo',$correo)->with('rol',$rol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$correo)
    {
       return view('home.crearHorario')->with('correo',$correo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horario =new Horario();
        $horario->dia=$request->dia;
        $horario->hora_inicio=$request->hora_inicio;
        $horario->hora_fin=$request->hora_fin;
        $horario->save();
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
    public function destroy($idhorario)
    {
        $horario=Horario::find($idhorario);
        $horario->delete();
        return back();
    }
}
