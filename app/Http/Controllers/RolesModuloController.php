<?php

namespace App\Http\Controllers;

use App\Models\RolesModule;
use App\Models\User;
use Illuminate\Http\Request;

class RolesModuloController extends Controller
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
                $datos = RolesModule::select('idRolMod','rolDes','molDes')
                ->join('roles', 'rol_mod.idRol','=','roles.idRol')
                ->join('roles_module', 'rol_mod.idMol','=','roles_module.idMol')
                ->where('rol_mod.empId' , 1)
                ->get();
                return response()->json($datos , 200);
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
                $affected = RolesModule::create(['idRol' => $request->idRol,
                                                 'idMol' => $request->idMol,
                                                 'empId' => 1
                                    ]);

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Modulo asignado de manera correcta",
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
        $xid    = $request->idMol;

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                if($item->activado = 'A'){
                    $id = $item->id;
                }
            }
            if($id >0){
                //$valida = ::all()->where('idRol' , $xid)->take(1);
                   $valida  = []; 
                //si la variable es null o vacia elimino el rol
                if(sizeof($valida) > 0 ){
                    //en el caso que no se ecuentra vacia no puedo eliminar
                    $resources = array(
                        array("error" => "1", 'mensaje' => "El rol no se puede eliminar",
                        'type'=> 'danger')
                        );
                    return response()->json($resources, 200);
                }else{
                    $affected = RolesModule:: where('idMol', $xid)->delete();

                    if($affected > 0){
                        $resources = array(
                            array("error" => '0', 'mensaje' => "Rol Eliminado Correctamente" ,'type'=> 'warning')
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
}
