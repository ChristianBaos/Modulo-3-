<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\IngresoVehiculoFormRequest;
use App\Ingreso_Vehiculos;
use DB;

class Ingreso_vehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        $ingreso = Ingreso_Vehiculos::all();
        return view('Ingreso_Vehiculos.index')->with('ingreso', $ingreso);
    }*/

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ingreso = DB::table('ingreso_vehiculos as i')
            ->join('vehiculos as v','i.Vehiculo_Id_Vehiculo', '=','v.Id_Vehiculo')
           // ->join('salida_vehiculos as s','i.Id_Ingreso', '=','s.Ingreso_idIngreso')
            ->Select('i.Id_Ingreso','i.Fecha_Ingreso',/*'s.Fecha_Salida',*/'i.Estado','i.Vehiculo_Id_Vehiculo','v.Placa','i.Users_Id')
            ->where('Id_Ingreso', 'LIKE', '%' . $query . '%')->orderBy('Id_Ingreso', 'asc')->paginate(5);
            return view('Ingreso_vehiculos.index', ["ingreso" => $ingreso, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculo = DB::table('vehiculos')->select('vehiculos.Placa', 'vehiculos.Id_Vehiculo')->get();
        return view('Ingreso_Vehiculos.create')->with('vehiculos', $vehiculo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingreso = new Ingreso_Vehiculos;
        $ingreso->Id_Ingreso = $request->get('id_ingreso');
        $ingreso->Fecha_Ingreso = $request->get('fecha_ingreso');
        $ingreso->Estado = $request->get('estado');
        $ingreso->Users_Id = $request->get('users_id');
        $ingreso->Vehiculo_Id_Vehiculo = $request->get('vehiculos_id_vehiculo');
        $ingreso->save();
//dd($ingreso);
        return Redirect::to('Ingreso_vehiculos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Id_Ingreso)
    {
        $ingreso = Ingreso_Vehiculos::find($Id_Ingreso);
        return view('Ingreso_Vehiculos.show',compact('Ingreso_Vehiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Ingreso)
    {
        $ingreso = Ingreso_Vehiculos::find($Id_Ingreso);
        $vehiculos_id_vehiculos = DB::table('ingreso_vehiculos')->select('ingreso_vehiculos.Id_Ingreso', 'Ingreso_Vehiculos.Vehiculo_Id_Vehiculo')->get();
        return view('Ingreso_Vehiculos.edit', compact('ingreso'))->with('Vehiculos_Id_Vehiculos',$vehiculos_id_vehiculos);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Ingreso)
    {
        $this->validate($request, ['Fecha_Ingreso' => 'required', 'Estado' => 'required', 'Users_Id' => 'required', 'Vehiculos_Id_Vehiculos' => 'required']);
        Ingreso_Vehiculos::find($Id_Ingreso)->update($request->all());
        return Redirect()->route('Ingreso_Vehiculos.index')->with('success', 'Ingreso Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy($Id_Ingreso)
    {
        Ingreso_Vehiculos::find($Id_Ingreso)->delete();
        return redirect()->route('Ingreso_vehiculos.index')->with('success', 'Ingreso Eliminado');
 
    }*/
    
    public function destroy($Id_Ingreso)
    {
        $ingreso = Ingreso_Vehiculos::findOrFail($Id_Ingreso);
        $ingreso->delete();
        return redirect()->route('Ingreso_vehiculos.index');
    }
}
