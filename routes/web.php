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



    Route::get('productos'      , 'App\Http\Controllers\ProductoController@index');
    Route::get('productos1'     , 'App\Http\Controllers\ProductoController@index1');
    Route::get('filter_prdDes'  , 'App\Http\Controllers\ProductoController@filtorCod');
    Route::post('updProducto'   , 'App\Http\Controllers\ProductoController@update');
    Route::post('productos'     , 'App\Http\Controllers\ProductoController@store');
    Route::post('log'           , 'App\Http\Controllers\UserController@authenticateUser');

    Route::post('insUser'       , 'App\Http\Controllers\UserController@ins_Users');
    Route::get('trabUsuarios'   , 'App\Http\Controllers\UserController@trabUsuarios');
    Route::get ('getUsuario'    , 'App\Http\Controllers\UserController@getUser');
    Route::post('up_Password'   , 'App\Http\Controllers\UserController@up_Password');
    Route::post('setUserSession', 'App\Http\Controllers\UserController@setUserSession');
    Route::get('valUsuario'     , 'App\Http\Controllers\UserController@valUsuario');
    Route::post('upUsuario'     , 'App\Http\Controllers\UserController@upUsuario');

    //Route::get('getUser'      , 'App\Http\Controllers\UserController@setUserSession');
    Route::get('Imprimir'       , 'App\Http\Controllers\Etiquetas@imprimir');

    Route::get('trabRoles'      , 'App\Http\Controllers\RolesController@index');
    Route::post('updRoles'      , 'App\Http\Controllers\RolesController@update');
    Route::post('insRoles'      , 'App\Http\Controllers\RolesController@insRoles');
    Route::post('delRoles'      , 'App\Http\Controllers\RolesController@delRoles');


    Route::get('trabGerencia'   , 'App\Http\Controllers\GerenciaController@index');
    Route::post('updGerencia'   , 'App\Http\Controllers\GerenciaController@update');
    Route::post('insGerencia'   , 'App\Http\Controllers\GerenciaController@insGerencia');
    Route::post('delGerencia'   , 'App\Http\Controllers\GerenciaController@delGerencia');



    Route::get('trabEtapas'     , 'App\Http\Controllers\EtapasController@index');
    Route::post('insEtapas'     , 'App\Http\Controllers\EtapasController@insEtapas');
    Route::post('delEtapas'     , 'App\Http\Controllers\EtapasController@delEtapas');
    Route::post('updEtapas'     , 'App\Http\Controllers\EtapasController@update');

    Route::get('trabEmpresa'    , 'App\Http\Controllers\EmpresaController@index');

    Route::get('trabPais'       , 'App\Http\Controllers\PaisController@index');
    Route::post('insPais'       , 'App\Http\Controllers\PaisController@insPais');
    Route::post('delPais'       , 'App\Http\Controllers\PaisController@delPais');
    Route::post('updPais'       , 'App\Http\Controllers\PaisController@update');
    Route::get('valCodPai'      , 'App\Http\Controllers\PaisController@valCodPai');



    Route::get('trabRegion'     , 'App\Http\Controllers\RegionController@index');
    Route::post('insRegion'     , 'App\Http\Controllers\RegionController@insRegion');
    Route::post('delRegion'     , 'App\Http\Controllers\RegionController@delRegion');
    Route::post('updRegion'     , 'App\Http\Controllers\RegionController@update');
    Route::get('valCodReg'      , 'App\Http\Controllers\RegionController@valCodReg');
    Route::get('regPai'          , 'App\Http\Controllers\RegionController@indexFil');

    Route::get('trabComuna'     , 'App\Http\Controllers\ComunaController@index');
    Route::post('insComuna'     , 'App\Http\Controllers\ComunaController@insComuna');
    Route::post('delComuna'     , 'App\Http\Controllers\ComunaController@delComuna');
    Route::post('updComuna'     , 'App\Http\Controllers\ComunaController@update');
    Route::get('valCodComuna'   , 'App\Http\Controllers\ComunaController@valCodComuna');
    Route::get('comReg'         , 'App\Http\Controllers\ComunaController@indexFil');


    Route::get('trabCiudad'     , 'App\Http\Controllers\CiudadController@index');
    Route::post('insCiudad'     , 'App\Http\Controllers\CiudadController@insCiudad');
    Route::post('delCiudad'     , 'App\Http\Controllers\CiudadController@delCiudad');
    Route::post('updCiudad'     , 'App\Http\Controllers\CiudadController@update');
    Route::get('valCodCiudad'   , 'App\Http\Controllers\CiudadController@valCodCiudad');
    Route::get('regCiu'         , 'App\Http\Controllers\CiudadController@indexFil');


    Route::get('trabProveedor'   , 'App\Http\Controllers\ProveedorController@index');
    Route::post('insProveedor'   , 'App\Http\Controllers\ProveedorController@insProveedor');
    Route::get('valPrvRut'       , 'App\Http\Controllers\ProveedorController@valPrvRut');
    Route::post('insPrvDes'      , 'App\Http\Controllers\ProveedorController@insPrvDes');
    Route::get('datPrv'          , 'App\Http\Controllers\ProveedorController@datPrv');
    Route::post('updProveedor'   , 'App\Http\Controllers\ProveedorController@update');



    Route::get('trabPrvDir'      , 'App\Http\Controllers\PrvDirController@index');
    //Route::post('delCiudad'     , 'App\Http\Controllers\CiudadController@delCiudad');

    //Route::get('valCodCiudad'   , 'App\Http\Controllers\CiudadController@valCodCiudad');
    //Route::get('regCiu'         , 'App\Http\Controllers\CiudadController@indexFil');
