<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Comuna;
use App\Models\User;
use App\Models\viewCiudad;
use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\PrvDirDes;

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

    public function ins(Request $request)
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

    public function del(Request $request)
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
           $valida = Comuna::all()->where('idCiu' , $xid)->take(1);
            if(sizeof($valida) > 0 ){
                  //en el caso que no se ecuentra vacia no puedo eliminar
                 $resources = array(
                    array("error" => "1", 'mensaje' => "La Comuna no se puede eliminar, asociado a Comuna",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);

            }else{

                $valida = Proveedor::all()->where('idCiu' , $xid)->take(1);

                if(sizeof($valida) > 0 ){
                    //en el caso que no se ecuentra vacia no puedo eliminar
                   $resources = array(
                      array("error" => "1", 'mensaje' => "La Comuna no se puede eliminar, asociado a Proveedor",
                      'type'=> 'danger')
                      );
                     return response()->json($resources, 200);
                }else{

                    $valida = PrvDirDes::all()->where('idCiu', $xid)->take(1);
                    if(sizeof($valida) > 0 ){
                        //en el caso que no se ecuentra vacia no puedo eliminar
                       $resources = array(
                          array("error" => "1", 'mensaje' => "La Comuna no se puede eliminar, asociado a Dirección",
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
             $datos = Ciudad::select(['idCiu', 'ciuDes'])
                              ->where('idPai' , $data['idPai'])
                              ->where('idReg' , $data['idReg'])->get();



             return $datos;

            }else{
                return response()->json('error' , 203);
            }
        }
    }


}
