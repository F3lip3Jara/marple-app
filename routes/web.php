<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
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



    Route::get('productos'    , 'App\Http\Controllers\ProductoController@index');
    Route::get('productos1'   , 'App\Http\Controllers\ProductoController@index1');
    Route::get('filter_prdDes', 'App\Http\Controllers\ProductoController@filtorCod');
    Route::post('updProducto' , 'App\Http\Controllers\ProductoController@update');
    Route::post('productos'   , 'App\Http\Controllers\ProductoController@store');
    Route::post('log'         , 'App\Http\Controllers\UserController@authenticateUser');
    Route::get('trabUsuarios' , 'App\Http\Controllers\UserController@trabUsuarios');
    Route::get('getUser'      , 'App\Http\Controllers\UserController@getUser');
    //Route::get('getUser'      , 'App\Http\Controllers\UserController@setUserSession');
    Route::get('Imprimir'     , 'App\Http\Controllers\Etiquetas@imprimir');
    Route::get('trabRoles'    , 'App\Http\Controllers\RolesController@index');
    Route::post('updRoles'    , 'App\Http\Controllers\RolesController@update');
    Route::post('insRoles'    , 'App\Http\Controllers\RolesController@insRoles');
    Route::post('delRoles'    , 'App\Http\Controllers\RolesController@delRoles');
    Route::get('filtroRoldes' , 'App\Http\Controllers\RolesController@filtroRoldes');
    Route::get('trabEtapas'   , 'App\Http\Controllers\EtapasController@index');
    Route::post('insEtapas'   , 'App\Http\Controllers\EtapasController@insEtapas');
    Route::post('delEtapas'   , 'App\Http\Controllers\EtapasController@delRoles');
    Route::post('updEtapas'   , 'App\Http\Controllers\EtapasController@update');




