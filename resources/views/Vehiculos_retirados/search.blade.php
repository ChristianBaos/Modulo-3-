{!! Form::open(array('url'=>'Vehiculos_retirados','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar por Placa" value="{{$searchText}}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar  <span class="glyphicon glyphicon-search"></button>
        </span>
    </div>
</div>{{Form::close()}}