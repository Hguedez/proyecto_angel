<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_venta_entrada;
use App\Cliente_natural;
use App\Venta;
use App\Entrada;
use App\Venta_entrada;

use Illuminate\Support\Facades\DB;

class Detalle_venta_entradaController extends Controller
{  
     /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request,$id_entrada,$id_venta_entrada,$id_costo,$correo)
    {   
        /*$request_updated_status = Entrada::where('id_entrada',$id_entrada);
        $request_status_data['disponible'] = 'true'; 
        $request_updated_status->update($request_status_data);*/

        /*if (Entrada::where(['id_entrada'=>$id_entrada])->first()){
            dd($id_entrada);
        }*/

        Entrada::where("id_entrada", $id_entrada)->update([
            'disponible' => 'false',
        ]);
        
        $detalle_entrada=new Detalle_venta_entrada();
        $detalle_entrada->precio=$id_costo;
        $detalle_entrada->fk_venta_entrada=$id_venta_entrada;
        $detalle_entrada->fk_entrada=$id_entrada;
        $detalle_entrada->save();
        
        $ventas=new Venta();
        $ventas->monto_total=$id_costo;
        $now = new \DateTime();
        $ventas->fecha_venta=$now->format('d-m-Y');
        $ventas->fk_cliente_natural=1;
        $sub = DB::select(DB::raw("SELECT precio_entrada from entrada WHERE id_entrada='$id_entrada'"));
        $subtotal = $sub[0]->precio_entrada;
        $monto = DB::select(DB::raw("SELECT precio from detalle_venta_entrada WHERE fk_venta_entrada='$id_venta_entrada'"));
        $monto_total = $monto[0]->precio;
        $ventas->save();
        $id = DB::select(DB::raw("SELECT Max(id_venta) as venta_id from venta"));
        $id_venta = $id[0]->venta_id;

        $detalle_venta_entrada = DB::select(DB::raw("SELECT id_detalle_entrada,precio,
                                                    (select numero_entrada from entrada where id_entrada='$id_entrada'),
                                                    (select fecha from venta_entrada where id_venta_entrada='$id_venta_entrada'),
                                                    (select monto_total from venta_entrada where id_venta_entrada='$id_venta_entrada' and fk_cliente_natural=1),
                                                    (select primer_nombre from cliente_natural where id_cliente_natural=1)
                                                    FROM detalle_venta_entrada WHERE fk_venta_entrada='$id_venta_entrada'and fk_entrada='$id_entrada'"));

        $aux = DB::select(DB::raw("SELECT fk_miembro,fk_empleado,fk_cliente_natural,fk_cliente_juridico  from usuario WHERE email = '$correo'"));
        if ($aux[0]->fk_miembro != null)
            $id_persona = $aux[0]->fk_miembro;
        else if ($aux[0]->fk_empleado != null)
            $id_persona = $aux[0]->fk_empleado;
        else if ($aux[0]->fk_cliente_natural != null)
            $id_persona = $aux[0]->fk_cliente_natural;
        else if ($aux[0]->fk_cliente_juridico != null)
            $id_persona = $aux[0]->fk_cliente_juridico;

        $checkT = DB::select(DB::raw("SELECT fk_rol  from usuario WHERE email = '$correo'"));
        $rol = $checkT[0]->fk_rol;

        return view ('home.misOrdenes')->with('detalle_venta_entrada',$detalle_venta_entrada)
                                       ->with('id_entrada',$id_entrada)
                                       ->with('id_venta_entrada',$id_venta_entrada)
                                       ->with('detalle_entrada',$detalle_entrada)
                                       ->with('subtotal',$subtotal)
                                       ->with('monto_total',$monto_total)
                                       ->with('id_venta',$id_venta)
                                       ->with('correo',$correo)
                                       ->with('id_persona',$id_persona)
                                       ->with('rol',$rol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id_detalle_entrada,$correo)
    {
        $detalle=Detalle_venta_entrada::find($id_detalle_entrada);
        $detalle->delete();
        $checkT = DB::select(DB::raw("SELECT MAX(id_venta) as id_venta_eliminar  from venta WHERE $id_detalle_entrada is not null "));
        $id_venta = $checkT[0]->id_venta_eliminar;
        $venta=Venta::find($id_venta);
        $venta->delete();
        $checkV_entrada = DB::select(DB::raw("SELECT MAX(id_venta_entrada) as id_entrada_venta  from venta_entrada WHERE $id_detalle_entrada is not null "));
        $id_entrada_venta = $checkV_entrada[0]->id_entrada_venta;
        $venta_entrada = Venta_entrada::find($id_entrada_venta);
        $venta_entrada->delete();
        return view('home.modelo')->with('correo',$correo);
    }
}
