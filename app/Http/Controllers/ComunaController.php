<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Comuna;
use App\Models\User;
use App\Models\viewComunas;

use Illuminate\Http\Request;

class ComunaController extends Controller
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
                    return viewComunas::all();

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
                    $affected = Comuna::where('idCom' , $request->idCom)->update([
                        'comDes' => $request->comDes
                    ]);

                    if($affected > 0){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Región actualizada manera correcta",
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

        public function insComuna(Request $request)
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
                    $affected = Comuna::create([
                        'idPai' => $request->idPai,
                        'empId'  => 1,
                        'idReg' => $request->idReg,
                        'comCod'  => $request->comCod,
                        'comDes'  => $request->comDes
                    ]);

                    if( isset( $affected)){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Comuna ingresada manera correcta",
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

        public function delComuna(Request $request)
        {
            $id     = 0;
            $header = $request->header('access-token');
            $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
            $xid    = $request->idCom;

            foreach($val as $item){
                if($item->activado = 'A'){
                    $id = $item->id;
                }
            }
            if($id >0){
                $valida = Ciudad::all()->where('idCom' , $xid)->take(1);
                //si la variable es null o vacia elimino el rol
                if(sizeof($valida) > 0 ){
                      //en el caso que no se ecuentra vacia no puedo eliminar
                     $resources = array(
                        array("error" => "1", 'mensaje' => "La Comuna no se puede eliminar",
                        'type'=> 'danger')
                        );
                       return response()->json($resources, 200);

                }else{
                    $affected = Comuna:: where('idCom', $xid)->delete();

                    if($affected > 0){
                        $resources = array(
                            array("error" => '0', 'mensaje' => "Comuna Eliminada Correctamente" ,'type'=> 'warning')
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



    public function valCodComuna(Request $request){
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
                    $comCod   = $data['comCod'];
                    $val    = Comuna::select('comCod')->where('comCod' , $comCod)->get();
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
             $datos = Comuna::select(['idCom' , 'comDes'])
                              ->where('idReg' , $data['idReg'])
                              ->get();

                foreach($datos as $item){
                    $resources = array(
                        array('idCom'     => $item->idCom,
                              'comDes'    => $item->comDes
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

