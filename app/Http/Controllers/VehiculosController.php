<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VehiculoFormRequest;
use App\Tipo_Vehiculos;
use App\Vehiculos;
use DB;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*
    public function index()
    {
        $vehiculos = Vehiculos::all();

        return view('vehiculos.index')->with('vehiculos', $vehiculos);
    }*/

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
           
            $vehiculos = DB::table('vehiculos as v')
            ->join('tipo_vehiculos as t','t.Id_Tipo', '=','v.table1_Id_Tipo')
            ->Select('v.Id_Vehiculo','v.Placa','v.table1_Id_Tipo','t.Nombre')
            ->where('Placa', 'LIKE', '%' . $query . '%')->orderBy('Id_Vehiculo', 'desc')->paginate(5);
            return view('Vehiculos.index', ["vehiculos" => $vehiculos, "searchText" => $query]);
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
