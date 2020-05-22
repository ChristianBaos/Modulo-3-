{!! Form::open(array('url'=>'Ingreso_vehiculos','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
<div class="form-group">
    <div class="input-group">
        <input type="text" class="form-control" style="text-align: center" name="searchText" placeholder="Buscar Por Placa..." value="{{$searchText}}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar <span class="glyphicon glyphicon-search"></button>
        </span>
    </div>
</div>
</div>
{{Form::close()}}