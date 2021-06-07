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

Route::get('/', function () {
    return view('templates.index');
});


//----------------------------------------------------citas quiropractica----------------------------------------------------
Route::name('citasq')->get('citasq/', 'App\Http\Controllers\sistemcontroller@citas_quiropractica');
Route::name('agendarCitaq')->get('agendarcitaq/', 'App\Http\Controllers\sistemcontroller@agendar_cita_quiropractica');
Route::name('guardarcitaq')->post('guardarcitaq/', 'App\Http\Controllers\sistemcontroller@guardar_cita_quiropractica');
Route::name('buscarcq')->post('buscarcq/', 'App\Http\Controllers\sistemcontroller@buscarcq');
Route::name('pdfcitacq')->post('generandocomprobantecq/', 'App\Http\Controllers\sistemcontroller@comprobantecqpdf');


