@extends ('layouts.layout')
@section ('contenido')

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nueva Ingreso Vehiculo</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

        @endif
        
        {!!Form::open(array('url'=>'Ingreso_vehiculos','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        
        <div class="form-group">
            <label for="Role">Placa</label>
            <select name="id_ingreso" id="id_ingreso" class="form-control selectpicker" data-livesearch="true" required>
                <option value="" disabled selected>Selecione La Placa:</option>
                @foreach($vehiculos as $vehiculo)
                <option value="{{$vehiculo->Id_Vehiculo}}">{{ $vehiculo->Placa }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha Ingreso</label>
            <input type="text" name="fecha_ingreso" class="form-control" 
            placeholder="Fecha Ingreso.." value="{{date('Y-m-d H:i:s') }}" disable>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select type="text" name="estado" class="form-control" placeholder="Estado. Activo ó Inactivo">
            <option value="" disabled selected>Opcion de Estado:</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
            </select>
            
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="users_id" class="form-control" value="1" readonly>
            </div>

            <div class="form-group">
            <label for="Role">ID Vehiculo</label>
            <select name="vehiculos_id_vehiculo" id="vehiculos_id_vehiculo" class="form-control selectpicker" data-livesearch="true" required>
                <option value="" disabled selected>Vehiculo:</option>
                @foreach($vehiculos as $vehiculo)
                <option value="{{$vehiculo->Id_Vehiculo}}">{{ $vehiculo->Id_Vehiculo }}</option>
                @endforeach
            </select>
        </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                <a href="{{url('Ingreso_vehiculos')}}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></span></a>
            </div>

            {!!Form::close()!!}
        </div>
    </div>
    @endsection