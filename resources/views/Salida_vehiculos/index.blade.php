@extends ('layouts.layout')
@section ('contenido')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Generar Ticket

            @include('Salida_vehiculos.search')
            <style>
            td  {
                background-color: #2a2f34;
            }

            thead{
                background-color: #b51130;
                
            }
            
        </style>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id Ingreso</th>
                    <th>Fecha_Ingreso</th>
                    <th>Placa</th>
                    <th>Nombre</th>
                    <th>Valor * Hora</th>
                    <th>Opciones</th>
                </thead>

                @foreach ($Salida_vehiculos as $salida)<tr>
                    <td>{{ $salida->Id_Ingreso}}</td>
                    <td>{{ $salida->Fecha_Ingreso}}</td>
                    <td>{{ $salida->Placa}}</td>
                    <td>{{ $salida->Nombre}}</td>
                    <td>{{ $salida->valor}}</td>

                    <td>
                    <a href="{{route('Salida_vehiculos',[$salida->Placa,$salida->Id_Ingreso,$salida->valor])}}">
                        <button class="btn btn-info"><span class=" glyphicon glyphicon-usd"></span>Retirar Vehiculo</button></a>
                        
                    </td>

                </tr>@endforeach
            </table>
        </div>
        {{$Salida_vehiculos->render()}}
    </div>
</div>@endsection