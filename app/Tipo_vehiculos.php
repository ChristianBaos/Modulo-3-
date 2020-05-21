<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_vehiculos extends Model
{
    public $timestamps = false; 

    protected $primaryKey='Id_Tipo';
    protected $fillable = ['Nombre','Descripcion'];
    

    //Relacion con la tabla Vehiculos
    
    public function vehiculos(){
        
        return $this->hasMany('App\Vehiculos');
    
    }
    

}
