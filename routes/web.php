<?php

use Illuminate\Support\Facades\Route;

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

Route::name('index')->get('/', function () {
    return view('templates.index');
});

Route::get('iniciarsesion/', function () {
    return view('templates.iniciar_sesion');
});


Route::name('misdatos')->get('misdatos/', function (){
    return view('templatesadmin.misdatos');
});

//---------------------------------------------------Buscar cita-------------------------------------------------------------
Route::name('buscarcita')->get('buscarcita/', function (){
    return view('templates.buscarmicita');
});
Route::name('buscandocita')->post('buscandocita/', 'App\Http\Controllers\sistemcontroller@buscarcitas');
Route::name('cancelarcita')->post('cancelarcita/', 'App\Http\Controllers\sistemcontroller@cancelarcita');

//----------------------------------------------------Inicio de sesión-------------------------------------------------------
Route::name('login')->post('login/', 'App\Http\Controllers\loginController@validar');
Route::name('bye')->get('bye/', 'App\Http\Controllers\loginController@logout');

//----------------------------------------------------Pacientes--------------------------------------------------------------
Route::name('pacientes')->get('pacientes/', 'App\Http\Controllers\sistemcontroller@Pacientes');


//----------------------------------------------------citas quiropractica----------------------------------------------------
Route::name('citasq')->get('citasq/', 'App\Http\Controllers\sistemcontroller@citas_quiropractica');
Route::name('agendarCitaq')->get('agendarcitaq/', 'App\Http\Controllers\sistemcontroller@agendar_cita_quiropractica');
Route::name('guardarcitaq')->post('guardarcitaq/', 'App\Http\Controllers\sistemcontroller@guardar_cita_quiropractica');
Route::name('buscarcq')->post('buscarcq/', 'App\Http\Controllers\sistemcontroller@buscarcq');
Route::name('pdfcitacq')->post('generandocomprobantecq/', 'App\Http\Controllers\sistemcontroller@comprobantecqpdf');
Route::name('modificarcita')->post('modificarcita/', 'App\Http\Controllers\sistemcontroller@modificarcita');
Route::name('salvar_cita')->post('salvarcita/', 'App\Http\Controllers\sistemcontroller@salvarcita');
Route::name('guardarcitaqadmin')->post('guardarcitaqa/', 'App\Http\Controllers\sistemcontroller@guardar_cita_quiropracticad');


//----------------------------------------------------Pruebas-----------------------------------------------------------------
Route::name('prueba')->get('prueba/', function (){
    return view('pruebas.fecha');
});
Route::name('horas')->post('horas/', 'App\Http\Controllers\pruebas@prueba');
