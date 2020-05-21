@extends ('layouts.layout')
@section ('contenido')
<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3 style="text-align: center">Actualizar Ingreso</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
        @endif

        <div class="panel-body" style="text-align: center">
            <div class="table-container" style="text-align: center">
                <form method="POST" action="{{ route('Ingreso_vehiculos.update',$ingreso->Id_Ingreso) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">


                    <div class="form-group">
                        <label for="Role">Fecha Ingreso</label>
                        <input type="text" name="Fecha_Ingreso" id="Fecha_Ingreso" class="form-control input-sm" 
                        value="{{$ingreso->Fecha_Ingreso}}" style="text-align: center">
                    </div>


                    <div class="form-group">
                        <label for="Role">Estado</label>
                        <select name="estado" id="estado" class="form-control selectpicker" value="{{$ingreso->Estado}}" 
                            style="text-align: center" data-livesearch="true" required>
                            <option value="" disabled selected>Opcion de Estado:</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="Role">Usuario</label>
                        <input readonly name="users_id" id="users_id" class="form-control input-sm" value="{{$ingreso->Users_Id}}" style="text-align: center">
                    </div>

                    <div class="form-group">
                        <label for="Role">Id Vehiculo</label>
                        <input readonly name="Vehiculos_Id_Vehiculos" id="Vehiculos_Id_Vehiculos" class="form-control input-sm" value="{{$ingreso->Vehiculo_Id_Vehiculo}}" style="text-align: center">
                    </div>

            </div>
        </div>

        <div class="form-group" style="text-align: center">
            <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
            <button class="btn btn-danger" type="reset">Cancelar <span class="glyphicon glyphicon-remove-circle"></span></button>
            <a href="{{ route('Ingreso_vehiculos.index') }}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></a>
        </div>
    </div>
</div>
@endsection