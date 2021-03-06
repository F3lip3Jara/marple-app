<?php

namespace App\Http\Controllers;

use App\Models\Proveedor ;
use App\Models\PrvDirDes;
use App\Models\User;
use App\Models\viewProveedores;
use Exception;
use Freshwork\ChileanBundle\Facades\Rut ;
use Illuminate\Http\Request;

class ProveedorController extends Controller
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
                return viewProveedores::all();

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
               $affected = Proveedor::where('idPrv' , $request->idPrv)->update([
                'prvNom'   => $request->prvNom,
                'prvNom2'  => $request->prvNom2,
                'prvGiro'  => $request->prvGiro,
                'prvDir'   => $request->prvDir,
                'prvNum'   => $request->prvNum,
                'prvTel'   => $request->prvTel,
                'prvMail'  => $request->prvMail,
                'prvCli'   => $request->prvCli,
                'prvPrv'   => $request->prvPrv,
                'idPai'    => $request->idPai,
                'idReg'    => $request->idReg,
                'idCom'    => $request->idCom,
                'idCiu'    => $request->idCiu,
                'prvAct'   => $request->prvAct
                ]);

                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Proveedor actualizado  manera correcta",
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
                $affected = Proveedor::create([
                        'empId'    => 1,
                        'prvRut'   => $request->prvRut,
                        'prvNom'   => $request->prvNom,
                        'prvNom2'  => $request->prvNom2,
                        'prvGiro'  => $request->prvGiro,
                        'prvDir'   => $request->prvDir,
                        'prvNum'   => $request->prvNum,
                        'prvTel'   => $request->prvTel,
                        'prvMail'  => $request->prvMail,
                        'prvCli'   => $request->prvCli,
                        'prvPrv'   => $request->prvPrv,
                        'idPai'    => $request->idPai,
                        'idReg'    => $request->idReg,
                        'idCom'    => $request->idCom,
                        'idCiu'    => $request->idCiu,
                        'prvAct'   => 'S'


                ]);

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Proveedor ingresado de manera correcta",
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


public function valPrvRut(Request $request){

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
                $data     = request()-> all();
                $prvRut   = $data['prvRut'];
                $val      = Proveedor::select('prvRut')->where('prvRut' , $prvRut)->get();
                $count  = 0;
                foreach($val as $item){
                    $count = $count + 1;
                }

                if($count >= 1){
                    $resources = array(
                          array("error" => '0', 'mensaje' => "rut ya existe" ,'type'=> 'warning')
                        );
                       return response()->json($resources, 200);
                }else{

                    try{

                        $rut = Rut::parse($prvRut)->validate();

                        if($rut != 1 ){
                            $resources = array(
                                array("error" => '0', 'mensaje' => "rut incorrecto" ,'type'=> 'warning')
                              );
                             return response()->json($resources, 200);

                        }else{
                            $resources = array(
                                array("error" => '1', 'mensaje' => "rut correcto" ,'type'=> 'warning')
                              );
                             return response()->json($resources, 200);
                        }

                    }catch(Exception $ex){
                        $resources = array(
                            array("error" => '0', 'mensaje' => "rut incorrecto" ,'type'=> 'warning')
                          );
                         return response()->json($resources, 200);
                    }



                }

        }else{
            return response()->json('error' , 203);
        }
   }
}


    public function datPrv(Request $request ){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
        $data   = $request->all();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            $datos = Proveedor::select(['idPai' , 'idReg' , 'idCom' , 'idCiu' , 'prvAct'])->where('idPrv', $data['idPrv'])->get();

                foreach($datos as $item){
                    $resources = array(
                        array('idPai'     => $item->idPai,
                            'idReg'     => $item->idReg,
                            'idCom'     => $item->idCom,
                            'idCiu'     => $item->idCiu,
                            'prvAct'    => $item->prvAct,
                            )
                        );
                    }
            return $resources;
        }
    }

    public function selCliente( Request $request)
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
                return viewProveedores::all()->where('es_cliente', 'S');

            }else{
                return response()->json('error' , 203);
            }
        }
    }



}
