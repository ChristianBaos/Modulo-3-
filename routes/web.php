<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

    
});

Route::resource('vehiculos', 'VehiculosController');
Route::resource('Ingreso_vehiculos','Ingreso_vehiculosController');
Route::resource('Salida_vehiculos','Salida_vehiculosController');

Route::resource('Vehiculos_retirados','Vehiculos_retiradosController');


Route::get('imprimirVehiculos','PdfController@imprimirVehiculos')->name('imprimirVehiculos');
Route::get('imprimirVehiculoEspecifico/{Id_Vehiculo}','PdfController@imprimirVehiculoEspecifico')->name('imprimirVehiculoEspecifico');

Route::get('imprimirIngreso_vehiculos','PdfController@imprimirIngreso_vehiculos')->name('imprimirIngreso_vehiculos');
Route::get('imprimirIngresoEspecifico/{Id_Ingreso}','PdfController@imprimirIngresoEspecifico')->name('imprimirIngresoEspecifico');

Route::get('imprimirVehiculosRetirados','PdfController@imprimirVehiculosRetirados')->name('imprimirVehiculosRetirados');
Route::get('imprimirSalida/{Id_Ingreso}','PdfController@imprimirSalida')->name('imprimirSalida');

Route::get('imprimirSalidaRango','PdfController@imprimirSalidaRango')->name('imprimirSalidaRango');


Route::get('Salida_vehiculos/{Placa}/{Id_Ingreso}/{valor}','Salida_vehiculosController@generarSalida')->name('Salida_vehiculos');


