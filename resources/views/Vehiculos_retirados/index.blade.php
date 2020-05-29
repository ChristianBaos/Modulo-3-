@extends ('layouts.layout')
@section ('contenido')
<a href="\imprimirVehiculosRetirados">
    <button class="btn btn-success">
        <span class="glyphicon glyphicon-download-alt">
        </span> Generar Reporte general</button></a> 
        
        <a href="\imprimirSalidaRango"><button class="btn btn-warning">
        <span class="glyphicon glyphicon-download-alt">
        </span> Generar PDF por rango</button></a></h3>

<div class="form-group col-lg-5">

    <label for="usuario">Fecha Inicio</label>
    <input type="date" name="fecha_salida" class="form-control" value="f2">

    <label for="usuario">Fecha Fin</label>
    <input type="date" name="fecha_salida" class="form-control" value="f1">

</div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Vehiculos Retirados

            <style>
                td {
                    background-color: #2a2f34;
                }

                thead {
                    background-color: #b51130;

                }
            </style>

            @include('Vehiculos_retirados.search')
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id Ticket</th>
                    <th>Id Ingreso</th>
                    <th>Placa</th>
                    <th>Nombre</th>
                    <th>Fecha de entrada</th>
                    <th>Fecha de salida</th>
                    <th>Total a pagar</th>
                    <th>Opciones</th>
                </thead>

                @foreach ($Vehiculos_retirados as $retiro)<tr>
                    <td>{{ $retiro->Id_Ticket}}</td>
                    <td>{{ $retiro->Id_Ingreso}}</td>
                    <td>{{ $retiro->Placa}}</td>
                    <td>{{ $retiro->Nombre}}</td>
                    <td>{{ $retiro->Fecha_Ingreso}}</td>
                    <td>{{ $retiro->Fecha_Salida}}</td>
                    <td>{{ $retiro->Total}}</td>


                    <td>
                        <a href="/imprimirSalida/{{$retiro->Id_Ingreso}}">
                            <button class="btn btn-warning"><span class="glyphicon glyphicon-download-alt"></span>Generar Ticket</button></a>
                    </td>

                </tr>@endforeach
            </table>
        </div>
        {{$Vehiculos_retirados->render()}}
    </div>
</div>@endsection