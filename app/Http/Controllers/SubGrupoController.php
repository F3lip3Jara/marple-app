<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\SubGrupo;
use App\Models\User;
use Illuminate\Http\Request;

class SubGrupoController extends Controller
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
                $var = SubGrupo::select(['idSubGrp',
                'sub_grupo.empId',
                'sub_grupo.idGrp',
                'grpsCod',
                'grpsDes',
                'grpCod',
                'grpDes'
                ])->join('grupo', 'sub_grupo.idGrp' , '=' , 'grupo.idGrp')->get();

                return response()->json($var , 200);


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
                $affected = SubGrupo::where('idSubGrp' , $request->idSubGrp)->update([
                    'grpsCod' => $request->grpsCod,
                    'grpsDes' => $request->grpsDes
                ]);

                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Sub Grupo actualizado manera correcta",
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
                $affected = SubGrupo::create([
                    'idGrp' => $request->idGrp,
                    'empId'  => 1,
                    'grpsCod' => $request->grpsCod,
                    'grpsDes'  => $request->grpsDes
                ]);

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Sub Grupo ingresado de manera correcta",
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
        $xid    = $request->idSubGrp;



        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id >0){
            $valida = Producto::all()->where('idSubGrp' , $xid)->take(1);
            //si la variable es null o vacia elimino el rol
            if(sizeof($valida) > 0 ){
                  //en el caso que no se ecuentra vacia no puedo eliminar
                 $resources = array(
                    array("error" => "1", 'mensaje' => "El sub grupo  no se puede eliminar",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);

            }else{
                $affected = SubGrupo:: where('idSubGrp', $xid)->delete();

                if($affected > 0){
                    $resources = array(
                        array("error" => '0', 'mensaje' => "Sub Grupo Eliminado Correctamente" ,'type'=> 'warning')
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



public function valCodSubGrp(Request $request){
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
                $grpsCod   = $data['grpsCod'];
                $val    = SubGrupo::select('grpsCod')->where('grpsCod' , $grpsCod)->get();
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
         $datos = SubGrupo::select(['idSubGrp' , 'grpsDes'])->where('idGrp', $data['idGrp'])->get();

            foreach($datos as $item){
                $resources = array(
                    array('idSubGrp'     => $item->idSubGrp,
                          'grpsDes'    => $item->grpsDes
                        )
                    );
                }
         return $datos;

        }else{
            return response()->json('error' , 203);
        }
    }
}

}
