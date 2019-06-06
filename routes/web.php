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
Route::group(['middleware'=>'adofop'],function(){
    //Consulta
    Route::get('consulta','Gv_pacienteController@index')->name('consulta');    
    
    Route::get('obtenerConsulta','Gv_consultaController@obtenerConsulta');
    Route::post('generarCertificado','Gv_consultaController@imprimirCertificado');
    Route::get('informacionCer/{co_id}','Gv_consultaController@obtenerConCer');
    Route::get('imprimirConsulta','Gv_consultaController@imprimirConsulta');
    //Lentes Contacto
    Route::post('agregarLenteC','Gv_selectsController@guardarLenteContacto')->name('agregarLenteC');
    //Lentes Marco
    Route::post('/agregarLenteM','Gv_selectsController@guardarLenteMarco')->name('/agregarLenteM'); 
    //Medidas
    Route::get('medidasNuevas','Gv_consultaController@index');
    Route::post('ccorporales', 'Gv_consultaController@AgregarCcorporal')->name('ccorporales');
    Route::post('guardarmedidas', 'Gv_consultaController@guardar')->name('guardarmedidas');
    Route::post('agregarkeratrometria', 'Gv_consultaController@AgregarKeratrometria')->name('agregarkeratrometria');
    Route::post('tureporte','Gv_consultaController@generarTuReporte');
});
Route::group(['middleware'=>'adofopse'],function(){
    Route::get('obtenerPaciente/{pa_id}','Gv_pacienteController@obtenerPaciente');
    Route::post('buscarPaciente','Gv_pacienteController@autocomplete')->name('buscarPaciente');
    Route::get('obtenerPacienteSecre/{pa_id}','Gv_pacienteController@obtenerPacienteSecre');
    Route::get('obtenerSecreConsulta/{co_id}','Gv_consultaController@obtenerSecreConsulta');
    Route::post('/agregarLocalidad','Gv_selectsController@guardarLocalidad')->name('/agregarLocalidad');
    Route::get('listarLocalidades','Gv_selectsController@obtenerLocalidades')->name('listarLocalidades');
    Route::post('guardarPaciente','Gv_pacienteController@guardarPaciente')->name('guardarPaciente');  
    
    Route::get('proximasConsultas','Gv_consultaController@proximasConsultas');
    Route::get('verificarConsultas/{co_id}','Gv_consultaController@verificarProximas');
    Route::get('secreConsulta', function () {
        return view('secretaria.consultas');
    });
    Route::post('/agregarSucursal','Gv_selectsController@guardarSucursal')->name('/agregarSucursal');
    Route::get('listarSucursal','Gv_selectsController@obtenerSucursal')->name('listarSucursal');
});
Route::group(['middleware'=>'admin'],function(){
    Route::post('usuario','Gv_usuarioController@store')->name('usuario');
    Route::get('crearUsuario','Gv_usuarioController@create');
    Route::get('usuarios','Gv_usuarioController@index')->name('usuarios');
    Route::get('activaAdmin/{us_cedula}','Gv_usuarioController@editarAdministrador');
    Route::get('activaOfta/{us_cedula}','Gv_usuarioController@editarOftalmologo');
    Route::get('activaOptom/{us_cedula}','Gv_usuarioController@editarOptometrista');
    Route::get('activaSecre/{us_cedula}','Gv_usuarioController@editarSecretaria');
    Route::get('obtenerUsuario/{us_cedula}','Gv_usuarioController@edit');
    Route::post('actualizarUsuario','Gv_usuarioController@update');

    Route::get('/administrador', function(){
        return view('administrador.index');
    });

    //reportes
    Route::get('reportes','Gv_consultaController@reportes');
    Route::post('todoreporte','Gv_consultaController@generarTodosReporte');
    Route::post('reporteopof','Gv_consultaController@generarOpOf');
    Route::post('reportesucu','Gv_consultaController@generarSucursal');

});
Route::group(['middleware'=>'secre'],function(){
    Route::get('agregarPaciente','Gv_pacienteController@agregarPacienteS');
    Route::get('/secretaria',function(){
        return view('secretaria.index');
    });
    
});
Route::group(['middleware'=>'opt'],function(){
    Route::get('/opt',function(){
        return view('opt.index');
    });
    
});









Route::get('/', function () {
    return view('front.index');
})->middleware('guest');
Route::get('contacto', function () {
    return view('front.contacto');
})->middleware('guest');
Route::get('nosotros', function () {
    return view('front.nosotros');
})->middleware('guest');
Route::get('Index', function () {
    return view('front.index');
})->middleware('guest');

Route::post('login','Auth\LoginController@login');
Route::get('sistema','Auth\LoginController@showLoginForm');
Route::post('logout','Auth\LoginController@logout');
Route::resource('rolUsuario','Gv_rolController');




//Crear usuario


Auth::routes();

//Selects
     //Sucursales

 