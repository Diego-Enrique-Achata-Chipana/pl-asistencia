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
Auth::routes();
Route::post('/registrar','Auth\RegisterController@registrarUser');
Route::get('/registrar/validateEmail','Auth\RegisterController@validateEmail');

Route::group(['auth'], function(){
    Route::get('/usuarios','UserController@index');
    Route::get('/usuarios/read','UserController@read');
    Route::get('/usuarios/searchUser','UserController@searchUser');
    Route::post('/usuarios/create','UserController@createUser');
    Route::get('/usuarios/validateEmail','UserController@validateEmail');
    Route::get('/usuarios/show/{id}','UserController@showUser');
    Route::get('/usuarios/edit/{id}','UserController@editUser');
    Route::post('/usuarios/update/{id}','UserController@updateUser');
    Route::post('usuarios/{id}','UserController@delete');
    Route::get('usuarios/pdf','UserController@pdfAllUser');
    Route::get('usuarios/excel','UserController@excelAllUser');

    Route::get('/asistencias','AsistenciaController@index');
    Route::get('/asistencias/readIngreso','AsistenciaController@readIngreso');
    Route::get('/asistencias/searchIngreso','AsistenciaController@searchIngreso');
    Route::get('/asistencias/searchIngresoFecha/{fecha_ingreso}/{search_ingreso?}','AsistenciaController@searchIngresoFecha');
    Route::post('/asistencias/createIngreso','AsistenciaController@createIngreso');
    Route::get('/asistencias/validateIngreso','AsistenciaController@validateIngreso');

    Route::get('/asistencias/readSalida','AsistenciaController@readSalida');
    Route::get('/asistencias/searchSalida/{nombre?}/{apellido?}','AsistenciaController@searchSalida');
    Route::post('/asistencias/createSalida','AsistenciaController@createSalida');
    Route::get('/asistencias/validateSalida','AsistenciaController@validateSalida');

    Route::get('/asistencias/readIngresoSalida','AsistenciaController@readIngresoSalida');
    Route::get('/asistencias/search/ingreso-salida/{nombre}/{apellido}/{fecha}','AsistenciaController@searchIngresoSalida');
    Route::get('/asistencias/pdf/ingreso-salida/{opcion}','AsistenciaController@pdfAsistenciaIngresoSalida');


    Route::get('/asistencias/export/excel/{slug}','AsistenciaController@exportExcelAsistenciaSemanal');
    Route::get('/asistencias/export/excel/{opcion}/{slug}','AsistenciaController@excelAsistenciaSemanal');
    Route::get('/asistencias/excel/ingreso-salida/hoy','AsistenciaController@excelAsistenciaIngresoSalidaHoy');
    Route::get('/asistencias/excel/ingreso-salida/semanal','AsistenciaController@excelAsistenciaIngresoSalidaSemanal');
    Route::get('/asistencias/excel/ingreso-salida/quincenal','AsistenciaController@excelAsistenciaIngresoSalidaQuincenal');
    Route::get('/asistencias/excel/ingreso-salida/mensual','AsistenciaController@excelAsistenciaIngresoSalidaMensual');

    Route::get('/', function () {
        return view('welcome');
    });


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'HomeController@admin')->name('admin');

});

