<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class MonedaController extends Controller
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
                return Moneda:: all();
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
                $affected = Moneda::where('idMon' , $request->idMon)->update(
                    ['monCod' => $request->monCod,
                    'monDes' => $request->monDes

                    ]);

                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Moneda actualizada manera correcta",
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
                $affected = Moneda::create([
                    'monCod' => $request->monCod,
                    'monDes' => $request->monDes,
                    'empId'  =>1
                ]);

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Moneda ingresada manera correcta",
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
        $xid    = $request->idMon;
        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id >0){
            $valida = Producto::all()->where('idMon' , $xid)->take(1);
            //si la variable es null o vacia elimino el rol
            if(sizeof($valida) > 0 ){
                  //en el caso que no se ecuentra vacia no puedo eliminar
                  $resources = array(
                    array("error" => "1", 'mensaje' => "La Moneda no se puede eliminar",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);
            }else{
                $affected = Moneda:: where('idMon', $xid)->delete();

                if($affected > 0){
                    $resources = array(
                        array("error" => '0', 'mensaje' => "Moneda Eliminada Correctamente" ,'type'=> 'warning')
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

    public function valMonCod(Request $request){
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
                    $monCod   = $data['monCod'];
                    $val    = Moneda::select('monCod')->where('monCod' , $monCod)->get();
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
