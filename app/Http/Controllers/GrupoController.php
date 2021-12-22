<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Producto;
use App\Models\SubGrupo;
use App\Models\User;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index( Request $request )
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

            if($id > 0 ){
                return Grupo:: all();
            }else {
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
                $affected = Grupo::where('idGrp' , $request->idGrp)->update(
                    ['grpCod' => $request->grpCod,
                     'grpDes' => $request->grpDes

                    ]);

                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Grupo actualizado manera correcta",
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
                $affected = Grupo::create([
                    'grpCod' => $request->grpCod,
                    'grpDes' => $request->grpDes,
                    'empId'  =>1
                ]);

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Grupo ingresado manera correcta",
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
        $xid    = $request->idGrp;



        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id >0){
            $valida = SubGrupo::all()->where('idGrp' , $xid)->take(1);;
            //si la variable es null o vacia elimino el rol
            if(sizeof($valida) > 0 ){
                  //en el caso que no se ecuentra vacia no puedo eliminar
                  $resources = array(
                    array("error" => "1", 'mensaje' => "El Grupo no se puede eliminar",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);
            }else{

                $valida = Producto::all()->where('idGrp' , $xid)->take(1);;
                if(sizeof($valida) > 0){
                    $resources = array(
                        array("error" => "1", 'mensaje' => "El Grupo no se puede eliminar",
                        'type'=> 'danger')
                        );
                       return response()->json($resources, 200);

                }else{
                    $affected = Grupo:: where('idGrp', $xid)->delete();

                    if($affected > 0){
                        $resources = array(
                            array("error" => '0', 'mensaje' => "Grupo Eliminado Correctamente" ,'type'=> 'warning')
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

        }else{
                return response()->json('error' , 203);
        }
    }

    public function valGrpCod(Request $request){
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
                    $grpCod   = $data['grpCod'];
                    $val    = Grupo::select('grpCod')->where('grpCod' , $grpCod)->get();
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

}
