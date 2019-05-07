<?php
use Illuminate\Support\Facades\Route;
use GoldenVision\Http\Controllers\Administrador;
use GoldenVision\Http\Controllers\Gv_usuarioController;
use GoldenVision\Http\Controllers\Gv_sucursalController;
use Illuminate\Support\Facades\Auth;
use GoldenVision\Http\Controllers\Gv_pacienteController;

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
    return 'hola';
})->middleware('guest');

Route::post('logins','Auth\LoginController@login')->name('logins');
Route::resource('rolUsuario','Gv_rolController');
Route::get('/administrador', function(){
    return view('administrador.index');
});
Route::get('/opt','Gv_pacienteController@index');
Route::get('/secretaria',function(){
    return view('secretaria.index');
});

//Crear usuario
Route::post('usuario','Gv_usuarioController@store')->name('usuario');
Route::get('crearUsuario','Gv_usuarioController@create');
Auth::routes();

//Selects
     //Sucursales
Route::post('/agregarSucursal','Gv_selectsController@guardarSucursal')->name('/agregarSucursal');
Route::get('listarSucursal','Gv_selectsController@obtenerSucursal')->name('listarSucursal');
    //Localidades
Route::post('/agregarLocalidad','Gv_selectsController@guardarLocalidad')->name('/agregarLocalidad');
Route::get('listarLocalidades','Gv_selectsController@obtenerLocalidades')->name('listarLocalidades');

//consulta
Route::get('consulta','Gv_pacienteController@index')->name('consulta');
Route::post('guardarPaciente','Gv_pacienteController@guardarPaciente')->name('guardarPaciente');
Route::post('buscarPaciente','Gv_pacienteController@autocomplete')->name('buscarPaciente');
Route::get('obtenerPaciente/{pa_id}','Gv_pacienteController@obtenerPaciente');

//medidas
Route::get('medidasNuevas','Gv_consultaController@index');
Route::post('ccorporales', 'Gv_consultaController@AgregarCcorporal')->name('ccorporales');
Route::post('guardarmedidas', 'Gv_consultaController@guardar')->name('guardarmedidas');

