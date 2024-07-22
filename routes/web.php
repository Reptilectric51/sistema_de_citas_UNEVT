<?php

use Illuminate\Support\Facades\Route;
use App\Exports\CitasExport;

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

Route::name('about')->get('about/', 'App\Http\Controllers\sistemcontroller@about');

Route::name('contact')->get('contact/', function (){
    return view('templates.contact');
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
Route::name('modificar_paciente')->post('modificar_pacientes/', 'App\Http\Controllers\sistemcontroller@modificar_pacientes');
Route::name('salvar_paciente')->post('salvar_paciente/', 'App\Http\Controllers\sistemcontroller@salvar_paciente');

//----------------------------------------------------Datos-------------------------------------------------------------------
Route::name('modificardatos')->get('modificardatos/', function (){
    return view('templatesadmin.modificarmisdatos');
});
Route::name('guardarmisdatos')->post('guardarmisdatos/', 'App\Http\Controllers\modificacionesadminController@modificardatosadmin');

//----------------------------------------------------citas--------------------------------------------------------
Route::name('citasq')->get('citasq/', 'App\Http\Controllers\sistemcontroller@citas_quiropractica');
Route::name('agendarCitaq')->get('agendarcitaq/', 'App\Http\Controllers\sistemcontroller@agendar_cita_quiropractica');
Route::name('guardarcitaq')->post('guardarcitaq/', 'App\Http\Controllers\sistemcontroller@guardar_cita_quiropractica');
Route::name('buscarcq')->post('buscarcq/', 'App\Http\Controllers\sistemcontroller@buscarcq');
Route::name('pdfcitacq')->post('generandocomprobantecq/', 'App\Http\Controllers\sistemcontroller@comprobantecqpdf');
Route::name('modificarcita')->post('modificarcita/', 'App\Http\Controllers\sistemcontroller@modificarcita');
Route::name('salvar_cita')->post('salvarcita/', 'App\Http\Controllers\sistemcontroller@salvarcita');
Route::name('fechas_ocupadas')->post('fechas_ocupadas/', 'App\Http\Controllers\sistemcontroller@fechas_ocupadas');
Route::name('guardarcitaqadmin')->post('guardarcitaqa/', 'App\Http\Controllers\sistemcontroller@guardar_cita_quiropracticad');
Route::name('comprobantecitasqpdf')->post('comprobantecitasqpdf/', 'App\Http\Controllers\sistemcontroller@comprobantecitasqpdf');
Route::name('buscarusuario')->get('buscarusuario/', function (){
    $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
    $next_date = date('Y-m-d', strtotime($date .' +1 day'));
    return view('templates.buscar_paciente')
    ->with(['next_date' => $next_date]);
});
Route::name('buscardatospaciente')->post('buscardatospaciente/', 'App\Http\Controllers\sistemcontroller@buscar_usuario');
Route::name('como_pagar')->get('como_pagar/', function (){
    return view('templates.video_de_ayuda');
});

//------------------------------------------------------Reportes---------------------------------------------------------------
Route::name('reportesexcelcitas')->get('/reportesexcelcitas', function () {
    return Excel::download(new CitasExport, 'citas.xlsx');
});


//-------------------------------------------------------Usuario root----------------------------------------------------------
Route::name('usuarios')->get('usuarios/', 'App\Http\Controllers\rootController@buscar_usuario');
Route::name('registrar_nuevo_usuario')->get('registrar_nuevo_usuario/', function (){
    return view('templatesroot.agregarnuevousuario');
});
Route::name('crearusuario')->post('crearusuario/', 'App\Http\Controllers\rootController@crear_usuario');
Route::name('editar_usuario')->post('editar_usuario/', 'App\Http\Controllers\rootController@editar_usuarios');
Route::name('guardar_usuario')->post('guardar_usuario/', 'App\Http\Controllers\rootController@guardar_usuario');
Route::name('buscar_usuario')->post('buscar_usuario/', 'App\Http\Controllers\modificacionesadminController@buscar_usuario');