<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Ingreso_vehiculos;
use App\Salida_vehiculos;
use DB;
use Barryvdh\DomPDF\PDF;
//use App\Http\Controllers\PdfController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class Salida_vehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        $Salida_vehiculos = Salida_vehiculos::all();

        return view('Salida_vehiculos.index')->with('Salida_vehiculos', $Salida_vehiculos);
    }*/

    

    public function index(Request $request)
    {
        if ($request){
            
            $query=trim($request->get('searchText'));
            $salida=DB::table('vehiculos as v')
            ->join('ingreso_vehiculos as i','i.Vehiculo_Id_Vehiculo', '=','v.Id_Vehiculo')
            ->join('tipo_vehiculos as tv','tv.Id_Tipo', '=','v.table1_Id_Tipo')
            ->join('tarifa_vehiculos as t','tv.Id_Tipo', '=','t.table1_Id_Tipo')
            ->SELECT('i.Id_Ingreso','v.Placa', 'tv.Nombre', 'i.Fecha_Ingreso', 't.valor')
            ->where('v.Placa','LIKE','%'.$query.'%')->orderBy('Id_Ingreso', 'desc')
            ->where('t.Estado','Activo')
            ->where('i.Estado','Activo')->paginate(10);
            //dd($Salida);
         return view('Salida_vehiculos.index',["Salida_vehiculos"=>$salida,"searchText"=>$query]);//
        }
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // CREAR LA SALIDA EN EL CREATE
     /*
    public function create($salida,$Id_Ingreso,$valor)
    {
        $mytime=Carbon::now('America/Bogota');
        $tarifa=Ingreso_vehiculos::findOrFail($Id_Ingreso);
        $horas=$salida->Fecha_Ingreso->diffinHours();
        
        $total= $horas*$valor;
        $salida= new Salida_vehiculos;
        $salida->Fecha_Salida=$mytime->toDateTimeString();
        $salida->total=$total;
        $salida->Ingreso_idIngreso=$Id_Ingreso;
        $salida->save();
        $tarifa->estado='Inactivo';
        $tarifa->update();

        dd($salida);
    }*/

    
    public function generarSalida($salida,$Id_Ingreso,$valor)
    {
        $mytime=Carbon::now('America/Bogota');
        $tarifa=Ingreso_vehiculos::findOrFail($Id_Ingreso);
        $horas=$tarifa->Fecha_Ingreso->diffinHours();
        $total= $horas*$valor;

        $salida= new Salida_vehiculos;
        $salida->Fecha_Salida=$mytime->toDateTimeString();
        $salida->Total=$total;
        $salida->Ingreso_idIngreso=$Id_Ingreso;
        $salida->save();
        $tarifa->estado='Inactivo';
        $tarifa->update();

        $salidaespecifico = DB::table('salida_vehiculos as s')
        ->join('ingreso_vehiculos as i', 'i.Id_Ingreso', '=', 's.Ingreso_idIngreso')
        ->join('vehiculos as v', 'v.Id_Vehiculo', '=', 'i.Vehiculo_Id_Vehiculo')
        ->join('tipo_vehiculos as tv', 'tv.Id_Tipo', '=', 'v.table1_Id_Tipo')
        ->select('i.Id_Ingreso','v.Placa','i.Fecha_Ingreso','s.Fecha_salida','tv.Nombre','s.Total')
        ->where('i.Id_Ingreso', '=', $Id_Ingreso)->get();
       
        
        foreach ($salidaespecifico as $sa) {
            $placavehiculo = $sa->Placa;
            $fechaingreso = $sa->Fecha_Ingreso;
            $fechasalida = $sa->Fecha_salida;
            $idingreso = $sa->Id_Ingreso;
            $tiponombre = $sa->Nombre;
            $valortotal = $sa->Total;
        }
       

        $pdf = \PDF::loadView('Pdf.salida_vehiculosPDF', [
            'placavehiculo' => $placavehiculo,
            'fechaingreso' => $fechaingreso,
            'fechasalida' => $fechasalida,
            'idingreso' => $idingreso,
            'tiponombre' => $tiponombre,
            'valortotal' => $valortotal,
            
        ]);

        
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Salida Especifico.pdf');
        
        return Redirect::to('Salida_vehiculos');
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
