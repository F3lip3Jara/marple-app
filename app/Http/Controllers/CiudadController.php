<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\User;
use App\Models\viewCiudad;
use Illuminate\Http\Request;


class CiudadController extends Controller
{
    public function index( Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                $id = $item->id;
            }

            if($id > 0 )
            {
                return viewCiudad::all();

            }else{
                return response()->json('error' , 203);
            }
        }
    }

    public function update(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
        if($header == ''){
            return response()->json('error' , 203);
        }else{

            foreach($val as $item){
                if($item->activado = 'A'){
                    $id = $item->id;
                }
            }
            if($id > 0 ){
                $affected = Ciudad::where('idCiu' , $request->idCiu)->update([
                    'ciuDes' => $request->ciuDes
                ]);

                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Ciudad actualizada manera correcta",
                        'type'=> 'success')
                        );
                    return response()->json($resources, 200);
                }else{
                    return response()->json('error', 204);
                }
            }else {
                    return response()->json('error' , 203);
            }
        }
    }

    public function insCiudad(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                if($item->activado = 'A'){
                    $id = $item->id;
                }
            }

            if($id > 0 ){
                $affected = Ciudad::create([
                    'idPai' => $request->idPai,
                    'empId'  => 1,
                    'idReg' => $request->idReg,
                    'idCom' => $request->idCom,
                    'ciuCod'  => $request->ciuCod,
                    'ciuDes'  => $request->ciuDes
                ]);

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Ciudad ingresada manera correcta",
                        'type'=> 'success')
                        );
                    return response()->json($resources, 200);

                }else{
                    return response()->json('error' , 204);
                }

            }else {
                    return response()->json('error' , 203);
            }


        }
    }

    public function delCiudad(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
        $xid    = $request->idCiu;

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id >0){
          //  $valida = Proveedor::all()->where('idCom' , $xid)->take(1);
          $valida = array();
            //si la variable es null o vacia elimino el rol
            if(sizeof($valida) > 0 ){
                  //en el caso que no se ecuentra vacia no puedo eliminar
                 $resources = array(
                    array("error" => "1", 'mensaje' => "La Comuna no se puede eliminar",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);

            }else{
                $affected = Ciudad:: where('idCiu', $xid)->delete();

                if($affected > 0){
                    $resources = array(
                        array("error" => '0', 'mensaje' => "Ciudad Eliminada Correctamente" ,'type'=> 'warning')
                        );
                       return response()->json($resources, 200);
                   }else{
                      $resources = array(
                       array("error" => "2", 'mensaje' => "No se encuentra registro" ,'type'=> 'warning')
                       );
                      return response()->json($resources, 200);
                }

            }

        }else{
                return response()->json('error' , 203);
        }
    }



    public function valCodCiudad(Request $request){
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
            if($id > 0 ){
                    $data   = request()-> all();
                    $ciuCod   = $data['ciuCod'];
                    $val    = Ciudad::select('ciuCod')->where('ciuCod' , $ciuCod)->get();
                    $count  = 0;
                    foreach($val as $item){
                        $count = $count + 1;
                    }

                    return response()->json($count , 200);

            }else{
                return response()->json('error' , 203);
            }
    }
    }

    public function indexFil( Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
        $data   = $request->all();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                $id = $item->id;
            }

            if($id > 0 )
            {
             $datos = Ciudad::select(['idCiu' , 'ciuDes'])
                              ->where('idCom' , $data['idCom'])
                              ->get();

                foreach($datos as $item){
                    $resources = array(
                        array('idCiu'     => $item->idCiu,
                              'ciuDes'    => $item->ciuDes
                            )
                        );
                    }
             return $resources;

            }else{
                return response()->json('error' , 203);
            }
        }
    }


}
