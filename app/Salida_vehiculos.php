<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida_vehiculos extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    protected $primaryKey='Id_Ticket';
    protected $dates = ['Fecha_Ingreso'];
    protected $fillable = ['Fecha_Salida','Total','Ingreso_idIngreso'];

    
    public function ingreso_vehiculos()
    {
        return $this->belongsTo('App\Ingreso_vehiculos');
    }
}
