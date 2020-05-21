<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso_vehiculos extends Model
{

    public $timestamps = false;
    //protected $guarded=[];

    protected $primaryKey='Id_Ingreso';
    protected $dates =['Fecha_Ingreso'];
    protected $fillable = ['Estado','Vehiculo_Id_Vehiculo','Users_Id'];
     

    public function vehiculo(){

        return $this->belongsTo('App\Vehiculos');
}

public function salida_vehiculos(){

    return $this->belongsTo('App\Salida_vehiculos');
}

}