<?php

/*******************************************************************************************************************************************************/

Route::get('/', function () {
    return view('welcome');
});
Route::get('welcome', function () {
    return view('welcome');
});

/*******************************************************************************************************************************************************/

/*EVENTOS*/

Route::get('gestionarEvento', 'EventoController@GestionarEvento')->name('gestionarEvento');

Route::post('OpcionEvento', 'EventoController@OpcionEvento')->name('OpcionEvento');

Route::post('CrearEvento', 'EventoController@CrearEventostore')->name('CrearEvento');

Route::post('ModificarEvento', 'EventoController@ModificarEventostore')->name('ModificarEvento');

Route::post('AdaptarEvento', 'EventoController@AdaptarEventostore')->name('AdaptarEvento');

/*********************************************************************/

/*Actividad*/

Route::post('GestionarActividad','ActividadController@GestionarActividad')->name('GestionarActividad');

Route::post('OpcionActividad', 'ActividadController@OpcionActividad')->name('OpcionActividad');

Route::post('CrearActividad', 'ActividadController@CrearActividadstore')->name('CrearActividad');

Route::post('ModificarActividad', 'ActividadController@ModificarActividadstore')->name('ModificarActividad');

/*********************************************************************/

/*Personal*/

Route::post('GestionarPersonal','PersonalController@GestionarPersonal')->name('GestionarPersonal');

Route::post('OpcionPersonal', 'PersonalController@OpcionPersonal')->name('OpcionPersonal');

Route::post('CrearPersonal', 'PersonalController@CrearPersonalstore')->name('CrearPersonal');

Route::post('ModificarPersonal', 'PersonalController@ModificarPersonalstore')->name('ModificarPersonal');

/*********************************************************************/

/*Paquete*/

Route::post('GestionarPaquete','PaqueteController@GestionarPaquete')->name('GestionarPaquete');

Route::post('OpcionPaquete', 'PaqueteController@OpcionPaquete')->name('OpcionPaquete');

Route::post('CrearPaquete', 'PaqueteController@CrearPaquetestore')->name('CrearPaquete');

Route::post('ModificarPaquete', 'ModificarController@ModificarPaquetestore')->name('ModificarPaquete');

/*********************************************************************/

/*Material*/

Route::post('GestionarMaterial','MaterialController@GestionarMaterial')->name('GestionarMaterial');

Route::post('OpcionMaterial', 'MaterialController@OpcionMaterial')->name('OpcionMaterial');

Route::post('CrearMaterial', 'MaterialController@CrearMaterialstore')->name('CrearMaterial');

Route::post('ModificarMaterial', 'MaterialController@ModificarMaterialstore')->name('ModificarMaterial');

/*******************************************************************************************************************************************************/

/*RECINTOS*/

Route::get('gestionarRecinto', 'RecintoController@GestionarRecinto');

Route::post('OpcionRecinto', 'RecintoController@OpcionRecinto')->name('OpcionRecinto');

Route::post('CrearRecinto' , 'RecintoController@CrearRecintostore')->name('CrearRecinto');

Route::post('AdaptarRecinto' , 'RecintoController@AdaptarRecintostore')->name('AdaptarRecinto');

Route::post('ModificarRecinto' , 'RecintoController@ModificarRecintostore')->name('ModificarRecinto');

/*********************************************************************/

/*Ambientes*/

Route::post('gestionarAmbiente','AmbienteController@GestionarAmbiente');

Route::post('OpcionAmbiente', 'AmbienteController@OpcionAmbiente')->name('OpcionAmbiente');

Route::post('CrearAmbiente' , 'AmbienteController@CrearAmbientestore')->name('CrearAmbiente');

Route::post('AdaptarAmbiente' , 'AmbienteController@AdaptarAmbientestore')->name('AdaptarAmbiente');

Route::post('ModificarAmbiente' , 'AmbienteController@ModificarAmbientestore')->name('ModificarAmbiente');


/*******************************************************************************************************************************************************/

/*REPORTES*/

Route::get('gestionarReporte', 'ReporteController@GestionarReporte');

/*******************************************************************************************************************************************************/

/*CAJA*/

Route::get('gestionarCaja', 'CajaController@GestionarCaja');

/*******************************************************************************************************************************************************/

?>