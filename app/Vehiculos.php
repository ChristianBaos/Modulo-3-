<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    public $timestamps = false;
    
    protected $primaryKey='Id_Vehiculo';
 
protected $fillable = ['Placa','table1_Id_Tipo'];
    

    public function tipo_vehiculos()
    
    {
        return $this->belongsTo('App\Tipo_vehiculos');
    
    }

    public function ingreso_vehiculo()
    
    {
        
        return $this->belongsTo('App\Ingreso_vehiculos');

}
/*
public function ingreso_vehiculo(){
    
    return $this->hasManythrough(Tipo_vehiculos::class,Ingreso_vehiculos::class);
}*/
}