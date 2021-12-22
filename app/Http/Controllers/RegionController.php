<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Comuna;
use App\Models\Pais;
use App\Models\Proveedor;
use App\Models\PrvDirDes;
use App\Models\Region;
use App\Models\User;
use App\Models\viewRegiones;
use Illuminate\Http\Request;

class RegionController extends Controller
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
                    return viewRegiones::all()->take(3000);

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
                    $affected = Region::where('idReg' , $request->idReg)->update([
                        'regCod' => $request->regCod,
                        'regDes' => $request->regDes
                    ]);

                    if($affected > 0){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Región actualizada manera correcta",
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
                    $affected = Region::create([
                        'idPai' => $request->idPai,
                        'empId'  => 1,
                        'regCod' => $request->regCod,
                        'regDes'  => $request->regDes
                    ]);

                    if( isset( $affected)){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Región ingresada manera correcta",
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
            $xid    = $request->idReg;



            foreach($val as $item){
                if($item->activado = 'A'){
                    $id = $item->id;
                }
            }
            if($id >0){
                $valida = Ciudad::all()->where('idReg' , $xid)->take(1);
                //si la variable es null o vacia elimino el rol
                if(sizeof($valida) > 0 ){
                      //en el caso que no se ecuentra vacia no puedo eliminar
                     $resources = array(
                        array("error" => "1", 'mensaje' => "La Región  no se puede eliminar, asociado a Ciudad",
                        'type'=> 'danger')
                        );
                       return response()->json($resources, 200);

                }else{

                    $valida = Proveedor::all()->where('idReg' , $xid)->take(1);

                    if(sizeof($valida) > 0 ){
                        $resources = array(
                            array("error" => "1", 'mensaje' => "La Región  no se puede eliminar, asociado a Proveedor",
                            'type'=> 'danger')
                            );
                           return response()->json($resources, 200);

                    }else{

                        $valida = PrvDirDes::all()->where('idReg', $xid)->take(1);
                        if(sizeof($valida) > 0 ){
                            //en el caso que no se ecuentra vacia no puedo eliminar
                           $resources = array(
                              array("error" => "1", 'mensaje' => "La Comuna no se puede eliminar, asociado a Dirección",
                              'type'=> 'danger')
                              );
                             return response()->json($resources, 200);
                        }else{

                            $affected = Region:: where('idReg', $xid)->delete();

                            if($affected > 0){
                                $resources = array(
                                    array("error" => '0', 'mensaje' => "Región Eliminada Correctamente" ,'type'=> 'warning')
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
                }

            }else{
                    return response()->json('error' , 203);
            }
        }



    public function valCodReg(Request $request){
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
                    $regCod   = $data['regCod'];
                    $val    = Region::select('regCod')->where('regCod' , $regCod)->get();
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
             $datos = Region::select(['idReg' , 'regDes'])->where('idPai', $data['idPai'])->get();

                foreach($datos as $item){
                    $resources = array(
                        array('idReg'     => $item->idReg,
                              'regDes'    => $item->regDes
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
