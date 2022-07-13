<?php

namespace App\Http\Controllers;

use App\Models\Maquinas;
use App\Models\User;
use Illuminate\Http\Request;

class MaquinasController extends Controller
{
        public function index(Request $request){
            $id     = 0;
            $header = $request->header('access-token');
            $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();

            if($header == ''){
                return response()->json('error' , 203);
            }else{

                foreach($val as $item){
                    $id = $item->id;
                }
            if($id > 0 ){
               $maquinas = Maquinas::select('*')
                ->join('etapasUser', 'maquinas.idEta', '=', 'etapasUser.idEta')
                ->get();
                return response()->json($maquinas , 200);
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
            }
            if($id > 0 ){
                $affected = Maquinas::create(['idEta' => $request->idEta ,
                                              'maqCod'=> $request->maqCod ,
                                              'maqTip'=> $request->maqTip ,
                                              'maqDes'=> $request->maqDes ,
                                              'empId'=> 1 ]);

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Maquina ingresada manera correcta",
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

        public function del(Request $request)
        {
            $id     = 0;
            $header = $request->header('access-token');
            $val    = User::all(['id' , 'token' ])->where('token', $header );
            $xid    = $request->idMaq;

            foreach($val as $item){
                if($item->activado = 'A'){
                    $id = $item->id;
                }
            }

            if($id >0){
               /* $valida = Maquinas::all()->where('idMaq' , $xid)->take(1);
                //si la variable es null o vacia elimino el rol
                if(sizeof($valida) > 0 ){
                      //en el caso que no se ecuentra vacia no puedo eliminar
                      $resources = array(
                        array("error" => "1", 'mensaje' => "La Maquina no se puede eliminar",
                        'type'=> 'danger')
                        );
                       return response()->json($resources, 200);
                }else{*/
                    $affected = Maquinas:: where('idMaq', $xid)->delete();

                    if($affected > 0){
                        $resources = array(
                            array("error" => '0', 'mensaje' => "Maquina Eliminada Correctamente" ,'type'=> 'success')
                            );
                        return response()->json($resources, 200);
                    }else{
                        $resources = array(
                        array("error" => "2", 'mensaje' => "No se encuentra registro" ,'type'=> 'warning')
                        );
                        return response()->json($resources, 200);
                    }
                //}

            }else{
                    return response()->json('error' , 203);
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
                $affected = Maquinas::where('idMaq' , $request->idMaq)
                                  ->update(['idEta' => $request->idEta ,
                                  'maqDes'=> $request->maqDes ,
                                  'maqCod'=> $request->maqCod ,
                                  'maqTip'=> $request->maqTip ,
                                ]);

                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Maquina actualizada manera correcta",
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


    public function filEta(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{

            foreach($val as $item){
                $id = $item->id;
            }
        if($id > 0 ){

           $data = $request->all();
           $maquinas = Maquinas::select('*')
            ->join('etapasUser', 'maquinas.idEta', '=', 'etapasUser.idEta')
            ->where('maquinas.idEta' , $data['idEta'])
            ->get();

            return response()->json($maquinas , 200);

        }else {
            return response()->json('error' , 203);
        }
      }
    }


}


