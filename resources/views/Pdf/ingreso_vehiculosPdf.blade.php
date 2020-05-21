<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Vehiculos | Sistema Web</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Reporte de Vehiculos Ingresados</h3><img align="right" src="" alt="" width='100px'><br><br>
        <h1 class="text-center">Parqueadero Vida</h1>
        <h3 class="text-center">NIT: 123456-1</h3>
        <h3 class="text-center">Tel. 555555</h3><br> <br> <br>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Tipo Vehiculo</th>
                <th>Fecha de Ingreso</th>
                <th>Estado</th>
                <th>Placa</th>
            </tr>@foreach($ingreso as $in)<tr>
                <td>ID:{{$in->Id_Vehiculo}} : {{$in->Nombre}}</td>
                <td>{{$in->Fecha_Ingreso}}</td>
                <td>{{$in->Estado}}</td>
                <td>{{$in->Placa}}</td>
            </tr>@endforeach
        </table>
  
        <h6 align="center">Software de Parqueaderos version 1</h6>
    </div>
</body>

</html>