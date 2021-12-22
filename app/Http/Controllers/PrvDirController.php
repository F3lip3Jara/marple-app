<?php

namespace App\Http\Controllers;

use App\Models\PrvDirDes;
use App\Models\User;
use App\Models\viewProveedorDir;
use Illuminate\Http\Request;

class PrvDirController extends Controller
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
                return viewProveedorDir::all();

            }else{
                return response()->json('error' , 203);
            }
        }
    }

    public function del(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
        $xid    = $request->id;



        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id >0){


                $affected = PrvDirDes:: where('idPrvd', $xid)->delete();

                if($affected > 0){
                    $resources = array(
                        array("error" => '0', 'mensaje' => "Dirección Proveedor Eliminada Correctamente" ,'type'=> 'succes')
                        );
                       return response()->json($resources, 200);
                   }else{
                      $resources = array(
                       array("error" => "2", 'mensaje' => "No se encuentra registro" ,'type'=> 'warning')
                       );
                      return response()->json($resources, 200);
                }



        }else{
                return response()->json('error' , 203);
        }
    }

    public function ins(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
        $xid    = $request->idReg;

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id >0){

            $affected = PrvDirDes::create([
                'empId'    => 1,
                'idPrv'    => $request->idPrv,
                'prvdDir'  => $request->prvDir,
                'prvdNum'  => $request->prvNum,
                'idPai'    => $request->idPai,
                'idReg'    => $request->idReg,
                'idCom'    => $request->idCom,
                'idCiu'    => $request->idCiu
        ]);
            if(isset( $affected)){
                $resources = array(
                    array("error" => '0', 'mensaje' => "Dirección agregada Correctamente" ,'type'=> 'success')
                    );
                return response()->json($resources, 200);
            }else{
                $resources = array(
                array("error" => "2", 'mensaje' => "No se encuentra registro" ,'type'=> 'warning')
                );
                return response()->json($resources, 200);
            }

        }else{
                return response()->json('error' , 203);
        }
    }


}
