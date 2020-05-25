@extends('layouts.layout')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de ingresos 
            <a href="/Ingreso_vehiculos/create"><button class="btn btn-success fa fa-car">Nuevo</button></a>
        </h3>
        <h3>Reporte Todos Los Vehiculos Ingresados <a href="\imprimirIngreso_vehiculos">
            <button class="btn btn-success">
            <span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a></h3>
            @include('Ingreso_vehiculos.search')
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id_Ingreso</th>
                    <th>Fecha Ingreso</th>
                 
                    <th>Estado</th>
                    <th>Id Vehiculo</th>
                    <th>Usuario</th>
                    <th>Placa</th>
                    <th>Opciones</th>

                </thead>
                @foreach ($ingreso as $ingresos)
                <tr>
                    <td>{{$ingresos->Id_Ingreso}}</td>
                    <td>{{$ingresos->Fecha_Ingreso}}</td>
                 
                    <td>{{$ingresos->Estado}}</td>
                    <td>{{$ingresos->Vehiculo_Id_Vehiculo}}</td>
                    <td>{{$ingresos->Nombre}}</td>
                    <td>{{$ingresos->Placa}}</td>

                    <td>
                        <a href="{{URL::action('Ingreso_vehiculosController@edit',$ingresos->Id_Ingreso)}}">
                            <button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$ingresos->Id_Ingreso}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar</button></a>
                            <a href="/imprimirIngresoEspecifico/{{$ingresos->Id_Ingreso}}">
                            <button class="btn btn-warning"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a>
                    </td>
                </tr>
                @include('Ingreso_vehiculos.modal')
                @endforeach
            </table>
        </div>
        {{$ingreso->render()}}
    </div>
    
</div>
@endsection