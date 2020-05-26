<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Ingreso_vehiculos;
use App\Salida_vehiculos;
use DB;

class Vehiculos_retiradosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //VISUALIZAR LOS VEHICULOS RETIRADOS CON EL TOTAL A PAGAR//
    public function index(Request $request)
    {
        if ($request){
            
            $query=trim($request->get('searchText'));
            $retiro=DB::table('vehiculos as v')
            ->join('ingreso_vehiculos as i','i.Vehiculo_Id_Vehiculo', '=','v.Id_Vehiculo')
            ->join('tipo_vehiculos as tv','tv.Id_Tipo', '=','v.table1_Id_Tipo')
            ->join('tarifa_vehiculos as t','tv.Id_Tipo', '=','t.table1_Id_Tipo')
            ->join('salida_vehiculos as s','s.Ingreso_idIngreso', '=','i.Id_Ingreso')
            ->SELECT('s.Id_Ticket','i.Id_Ingreso','v.Placa', 'tv.Nombre', 'i.Fecha_Ingreso','s.Fecha_Salida', 's.Total')
            ->where('v.Placa','LIKE','%'.$query.'%')->orderBy('Id_Ticket', 'asc')
            ->where('t.Estado','Activo')
            ->where('i.Estado','Inactivo')->paginate(10);
            //dd($Salida);
         return view('Vehiculos_retirados.index',["Vehiculos_retirados"=>$retiro,"searchText"=>$query]);//
        }
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
    public function destroy($id)
    {
        //
    }
}
