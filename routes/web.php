<?php
use Illuminate\Support\Facades\Route;
use GoldenVision\Http\Controllers\Administrador;
use GoldenVision\Http\Controllers\Gv_usuarioController;


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
    return view('auth.login');
})->middleware('guest');

Route::post('logins','Auth\LoginController@login')->name('logins');

Route::resource('rolUsuario','Gv_rolController');
Route::get('/administrador','Administrador@index');
Route::resource('usuario','Gv_usuarioController');
Route::get('crearUsuario','Gv_usuarioController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
