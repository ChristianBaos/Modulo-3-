<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$ingresos->Id_Ingreso}}"> 
{{Form::Open(array('action'=>array('Ingreso_vehiculosController@destroy',$ingresos->Id_Ingreso),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Retirar Vehiculo</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea Retirar el Vehiculo</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </div>
        </div>
        {{Form::Close()}}
    </div>