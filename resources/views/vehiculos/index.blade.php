@extends('layouts.layout')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Vehiculos
            <a href="vehiculos/create">
                <button class="btn btn-success fa fa-car">Nuevo</button></a></h3>
        <h3>Reporte Todos Los Vehiculos <a href="\imprimirVehiculos"><button class="btn btn-info">
        <span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a></h3>

    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover ">
                <thead>
                    <th>Id_Vehiculo</th>
                    <th>Placa</th>
                    <th>Nombre</th>
                    <th>Id_Tipo</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($vehiculos as $vehiculo)<tr>
                    <td>{{ $vehiculo->Id_Vehiculo}}</td>
                    <td>{{ $vehiculo->Placa}}</td>
                    <td>{{ $vehiculo->Nombre}}</td>
                    <td>{{ $vehiculo->table1_Id_Tipo}}</td>

                    <td>
                        <a href="{{URL::action('VehiculosController@edit',$vehiculo->Id_Vehiculo)}}">

                            <button class="btn btn-success"> <span class="glyphicon glyphicon-refresh"></span>Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$vehiculo->Id_Vehiculo}}" data-toggle="modal">
                            <button class="btn btn-danger"> <span class="glyphicon glyphicon-trash"> </span>Retirar Vehiculo
                            </button></a>
                            <a href="/imprimirVehiculoEspecifico/{{$vehiculo->Id_Vehiculo}}">
                            <button class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        {{$vehiculos->render()}}
    </div>
</div>
@endsection