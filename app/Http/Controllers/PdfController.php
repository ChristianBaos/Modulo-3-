<?php

namespace App\Http\Controllers;

use App\Ingreso_vehiculos;
use DB;

use Illuminate\Http\Request;

class PdfController extends Controller
{

    //PDF DE TODOS LOS VEHICULOS
    public function imprimirVehiculos(Request $request)
    {
        $vehiculos = DB::table('vehiculos as ve')->join('tipo_vehiculos as tv', 'tv.Id_Tipo', '=', 've.table1_Id_Tipo')
            ->select('tv.Nombre', 've.table1_Id_Tipo', 've.Id_Vehiculo', 've.Placa')->get();
        $pdf = \PDF::loadView('Pdf.vehiculosPDF', ['vehiculos' => $vehiculos]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de Vehiculos.pdf');
    }

    //PDF ESPECIFICO DE UN VEHICULO
    public function imprimirVehiculoEspecifico(Request $request, $id_vehiculo)
    {

        $vehiculoespecifico = DB::table('vehiculos as ve')
            ->join('tipo_vehiculos as tv', 'tv.Id_Tipo', '=', 've.table1_Id_Tipo')
            ->select('tv.Nombre', 've.table1_Id_Tipo', 've.Id_Vehiculo', 've.Placa')
            ->where('ve.Id_Vehiculo', '=', $id_vehiculo)->get();

        foreach ($vehiculoespecifico as $ve) {
            $tiponombre = $ve->Nombre;
            $tipovehiculoid = $ve->table1_Id_Tipo;
            $idvehiculo = $ve->Id_Vehiculo;
            $placavehiculo = $ve->Placa;
        }
        //dd($vehiculoespecifico);
        //Pdf.vehiculoEspecificoPDF => Tiene que ser el mismo nombre que colocara en el views/Pdf/.....

        $pdf = \PDF::loadView('Pdf.vehiculoEspecificoPDF', [
            'tiponombre' => $tiponombre,
            'tipovehiculoid' => $tipovehiculoid,
            'idvehiculo' => $idvehiculo,
            'placavehiculo' => $placavehiculo,
        ]);

        
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Vehiculo Especifico.pdf');
    }

//PDF DE TODOS LOS INGRESOS//
    public function imprimirIngreso_vehiculos(Request $request)
    {

        $ingreso = DB::table('ingreso_vehiculos as i')
            ->join('vehiculos as ve', 've.Id_Vehiculo', '=', 'i.Vehiculo_Id_Vehiculo')
            ->join('tipo_vehiculos as tv', 'tv.Id_Tipo', '=', 've.table1_Id_Tipo')
            ->select('ve.Id_Vehiculo', 've.Placa', 'i.Fecha_Ingreso', 'i.Estado', 'tv.Nombre')->get();
        $pdf = \PDF::loadView('Pdf.ingreso_vehiculosPDF', ['ingreso' => $ingreso]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de Vehiculos.pdf');
    }


    //PDF DE UN INGRESO ESPECIFICO//
    public function imprimirIngresoEspecifico(Request $request, $id_ingreso)
    {

        $ingresoespecifico = DB::table('ingreso_vehiculos as i')
        ->join('vehiculos as ve', 've.Id_Vehiculo', '=', 'i.Vehiculo_Id_Vehiculo')
        ->join('tipo_vehiculos as tv', 'tv.Id_Tipo', '=', 've.table1_Id_Tipo')
        ->select('ve.Id_Vehiculo', 've.Placa','i.Id_Ingreso','i.Fecha_Ingreso', 'i.Estado', 'tv.Nombre')
        ->where('i.Id_Ingreso', '=', $id_ingreso)->get();

        foreach ($ingresoespecifico as $in) {
            $placavehiculo = $in->Placa;
            $fechaingreso = $in->Fecha_Ingreso;
            $estado = $in->Estado;
            $idingreso = $in->Id_Ingreso;
            $tiponombre = $in->Nombre;
        }
        //dd($vehiculoespecifico);
        //Pdf.vehiculoEspecificoPDF => Tiene que ser el mismo nombre que colocara en el views/Pdf/.....

        $pdf = \PDF::loadView('Pdf.ingresoEspecificoPDF', [
            'placavehiculo' => $placavehiculo,
            'fechaingreso' => $fechaingreso,
            'estado' => $estado,
            'idingreso' => $idingreso,
            'tiponombre' => $tiponombre,
        ]);

        
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Ingreso Especifico.pdf');
    }

    public function imprimirTicket(Request $request)
    {
    }
}
