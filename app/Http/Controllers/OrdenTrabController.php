<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\OrdTrabDet;
use App\Models\User;
use App\Models\viewOrdenTrabajoAdm;
use App\Models\viewOrdenTrabajoTermo;
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

    public function indexTermo( Request $request )
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
                return viewOrdenTrabajoTermo:: all();
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
                    $ordenes        = $item['otdet'];

                    $Ordt       = OrdenTrabajo::create([
                            'empId'     => 1,
                            'idOrp'     => $item['idOrp'],
                            'orptFech'  => $fecha,
                            'orptUsrG'  => $orpUsrG,
                            'orptTurns' => 'test',
                            'orptEst'   => 1,
                            'orptPrio'  => $item['orptPrio']

                    ]);

                    $idOrdt = $Ordt->id;



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
