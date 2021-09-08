<?php

namespace App\Http\Controllers;


use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index( Request $request )
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );
        foreach($val as $item){
            $id = $item->id;
        }
        if($id > 0 ){
            return Roles:: all()->take(100);
        }else {
            return response()->json('error' , 203);
        }
    }

    public function update(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id > 0 ){
            $affected = Roles::where('idRol' , $request->idRol)->update(['rolDes' => $request->rolDes]);

            if($affected > 0){
                return response()->json('OK', 200);
            }else{
                return response()->json('error', 204);
            }
        }else {
                return response()->json('error' , 203);
        }
    }

    public function insRoles(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id > 0 ){
            $affected = Roles::create(['rolDes' => $request->rolDes]);

            if( isset( $affected)){
                return response()->json('OK', 200);
            }else{
                return response()->json('error' , 204);
            }

        }else {
                return response()->json('error' , 203);
        }
    }

    public function delRoles(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );
        $xid    = $request->idRol;

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id >0){
            $valida = User::all()->where('idRol' , $xid)->take(1);
            //si la variable es null o vacia elimino el rol
            if(sizeof($valida) > 0 ){
                  //en el caso que no se ecuentra vacia no puedo eliminar
                  $resources = array(
                    array("error" => "1", 'mensaje' => "El rol no se puede eliminar",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);
            }else{
                $affected = Roles:: where('idRol', $xid)->delete();

                if($affected > 0){
                       return response()->json('OK', 200);
                   }else{
                      $resources = array(
                       array("error" => "1", 'mensaje' => "No se encuentra registro" ,'type'=> 'warning')
                       );
                      return response()->json($resources, 200);
                }

            }

        }else{
                return response()->json('error' , 203);
        }
    }

    public function filtroRoldes ( Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id > 0 ){
            return Roles::all('rolDes');
        }else {
            return response()->json('error' , 203);
        }
    }

}
