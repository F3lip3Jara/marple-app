<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Gerencia;
use App\Models\User;
use Illuminate\Http\Request;

class GerenciaController extends Controller
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
                return Gerencia:: all();
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
                $affected = Gerencia::where('gerId' , $request->gerId)->update(['gerDes' => $request->gerDes]);

                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Gerencia actualizada manera correcta",
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

    public function insGerencia(Request $request)
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
                $affected = Gerencia::create([
                    'gerDes' => $request->gerDes,
                    'empId'  =>1
                ]);

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Gerencia ingresada manera correcta",
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

    public function delGerencia(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
        $xid    = $request->gerId;



        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id >0){
            $valida = Empleado::all()->where('gerId' , $xid)->take(1);
            //si la variable es null o vacia elimino el rol
            if(sizeof($valida) > 0 ){
                  //en el caso que no se ecuentra vacia no puedo eliminar
                  $resources = array(
                    array("error" => "1", 'mensaje' => "La gerencia  no se puede eliminar",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);
            }else{
                $affected = Gerencia:: where('gerId', $xid)->delete();

                if($affected > 0){
                    $resources = array(
                        array("error" => '0', 'mensaje' => "Gerencia Eliminada Correctamente" ,'type'=> 'warning')
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



}
