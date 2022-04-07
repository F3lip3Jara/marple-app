<?php

namespace App\Http\Controllers;

use App\Models\EtapaDes;
use App\Models\LogSys;
use App\Models\User;
use Illuminate\Http\Request;


class EtapasDesController extends Controller
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
            $data = $request->all();

            return EtapaDes::select('*')
            ->join('etapasuser', 'etapasuserdes.idEta', '=', 'etapasuser.idEta')
            ->where('etapasuserdes.idEta', $data['idEta'])
            ->get();
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
            $affected = EtapaDes::create([
                'idEta' => $request->idEta,
                'etaDesDes' => $request->etaDesDes,
                'etaDesDel' => 'S'
            ]);

            if( isset( $affected)){
                $resources = array(
                    array("error" => "0", 'mensaje' => "Etapa ingresada manera correcta",
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
        $xid    = $request->idEtaDes;

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id >0){
           // $valida = EtapaDes::all()->where('idEtaDes' , $xid)->take(1);
            //si la variable es null o vacia elimino el rol
            $valida = LogSys::all()->where('idEtaDes' ,  $xid)->take(1);

            if(sizeof($valida) > 0 ){
                  //en el caso que no se ecuentra vacia no puedo eliminar
                  $resources = array(
                    array("error" => "1", 'mensaje' => "La etapa no se puede eliminar",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);
            }else{
                $affected = EtapaDes:: where('idEtaDes', $request->idEtaDes)
                            ->where('idEta' , $request->idEta)
                ->delete();

                if($affected > 0){
                    $resources = array(
                        array("error" => '0', 'mensaje' => "Etapa Eliminada Correctamente" ,'type'=> 'warning')
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
            $data = $request->all();
            $affected = EtapaDes::where('idEta' , $data['idEta'])
                                ->where('idEtaDes' , $data['idEtaDes'])
                                ->update(['etaDesDes' => $data['etaDesDes']]);


            if($affected > 0){
                $resources = array(
                    array("error" => "0", 'mensaje' => "Etapa actualizada manera correcta",
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
}
