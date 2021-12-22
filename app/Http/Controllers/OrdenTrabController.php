<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\OrdTrabDet;
use App\Models\User;
use App\Models\viewOrdenTrabajoAdm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdenTrabController extends Controller
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
                return viewOrdenTrabajoAdm:: all();
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
               /*  $affected = Pais::where('idPai' , $request->idPai)->update([
                    'paiCod' => $request->paiCod,
                    'paiDes' => $request->paiDes
                ]);

                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Pais actualizada manera correcta",
                        'type'=> 'success')
                        );
                    return response()->json($resources, 200);
                }else{
                    return response()->json('error', 204);
                } */
            }else {
                    return response()->json('error' , 203);
            }
        }
    }

    public function ins(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado' , 'name')->where('token' , $header)->get();
        $data   = $request->all();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                if($item->activado = 'A'){
                    $id      = $item->id;
                    $orpUsrG = $item->name;
                }
            }

            if($id > 0 ){
                foreach($data as $item){

                    $fecha          =  Carbon::now()->format('Y-m-d');


                  //  $orpFech        = $fecha['year'].'-'.$fecha['month'].'-'.$fecha['day'];
                    $ordenes        = $item['otdet'];

                    $idOrdt       = OrdenTrabajo::insertGetId([
                            'empId'     => 1,
                            'idOrp'     => $item['idOrp'],
                            'orptFech'  => $fecha,
                            'orptUsrG'  => $orpUsrG,
                            'orptTurns' => 'test',
                            'orptEst'    => 1,
                            'orptPrio'  => $item['orptPrio']

                    ]);





               foreach($ordenes as $orddet){
                 $affected=   OrdTrabDet::create([
                        'idOrdt'       => $idOrdt,
                        'empId'        => 1,
                        'ordtdPrdCod'  => $orddet['orpdPrdCod'],
                        'ordtdPrdDes'  => $orddet['orpdPrdDes'],
                        'ortdSol'      => $orddet['orpdTotP'],
                        'ortdProd'     => 0 ,
                        'orpdObs'      => ''
                    ]);
                }

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Orden ingresada manera correcta",
                        'type'=> 'success')
                        );
                    return response()->json($resources, 200);
                }else{
                    return response()->json('error' , 204);
                }

                }


            }else {
                    return response()->json('error' , 203);
            }
        }
    }

    public function del(Request $request)
    {
       /* $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
        $xid    = $request->idPai;



        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id >0){
            $valida = Region::all()->where('idPai' , $xid)->take(1);
            //si la variable es null o vacia elimino el rol
            if(sizeof($valida) > 0 ){
                  //en el caso que no se ecuentra vacia no puedo eliminar
                  $resources = array(
                    array("error" => "1", 'mensaje' => "El País  no se puede eliminar , asociado a Región",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);
            }else{

               $valida = Proveedor::all()->where('idPai', $xid)->take(1);

               if(sizeof($valida) > 0 ){

                $resources = array(
                    array("error" => "1", 'mensaje' => "El País  no se puede eliminar , asociado a Proveedor",
                    'type'=> 'danger')
                    );
                    return response()->json($resources, 200);
               }else{

                $valida = PrvDirDes::all()->where('idPai', $xid)->take(1);

                if(sizeof($valida) > 0 ){
                    //en el caso que no se ecuentra vacia no puedo eliminar
                   $resources = array(
                      array("error" => "1", 'mensaje' => "La Comuna no se puede eliminar , asociado a Dirección",
                      'type'=> 'danger')
                      );
                     return response()->json($resources, 200);
                }else{
                    $affected = Pais:: where('idPai', $xid)->delete();

                    if($affected > 0){
                        $resources = array(
                            array("error" => '0', 'mensaje' => "País Eliminado Correctamente" ,'type'=> 'warning')
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
        }*/
    }

    public function filopNumRea( Request $request )
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
                $data   = request()-> all();
                $resources = viewOrdenTrabajoAdm::select('*')->where('orden_produccion',$data['orpNumRea'])->get();
                if(isset($resources)){
                        return response()->json($resources, 200);
                }else{
                    $resources = array(
                        array("error" => "0", 'mensaje' => "No se encuentra coincidencia",
                        'type'=> 'success')
                        );
                    return response()->json($resources, 200);
                }
            }else{
                return response()->json('error' , 203);
            }
        }
    }


}
