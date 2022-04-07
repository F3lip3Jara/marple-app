<?php

namespace App\Http\Controllers;

use App\Models\BinCol;
use App\Models\Mezcla ;
use App\Models\MezclaDet;
use App\Models\User;
use App\Models\viewMezclas;
use Error;
use Illuminate\Http\Request;


class MezclaController extends Controller
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
                return viewMezclas:: all()->take(3000);
            }else {
                return response()->json('error' , 203);
            }
        }
    }


    public function ins(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'name')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                $id   = $item->id;
                $name = $item->name;
            }

            if($id > 0 ){
                    $data     = $request->all();
                    $mezUsu    = $name;
                    $mezLotSal = $data['mezLotSal'];
                    $mezKil    = $data['mezKil'];
                    $mezTip    = $data['mezTip'];
                    $mezDes    = '';
                    $mezEst    = 'A';
                    $mezEstCtl = 'P';
                    $mezMaq    = $data['mezMaq'];
                    $mezidEta  = $data['etapa'];
                    $producto  = $data['producto'];
                    $mezidPrd  = '';
                    $mezprdCod = '';
                    $mezprdDes = '';

                    if($mezLotSal == ''){
                        $colbnum = BinCol::select('colbnum')->take(1)->get();

                        foreach( $colbnum as $item){
                           $bin =  $item->colbnum + 1;
                           $affected = BinCol::where('idColb' , 1)->update([
                            'colbnum' =>   $bin
                            ]);
                        }

                        if($affected){
                            $mezLotSal = strval($bin);
                        }
                     }

                    if(sizeof($producto) > 0 ){
                        $mezidPrd  = $producto['idPrd'];
                        $mezprdCod = $producto['prdCod'];
                        $mezprdDes = $producto['prdDes'];
                    }
                    $mezProd   = $data['mezProd'];
                    $mezTurn   = $data['mezTurn'];

                    $affected = Mezcla::create([
                        'empId'      => 1,
                        'mezUsu'     => $mezUsu,
                        'mezLotSal'  =>$mezLotSal,
                        'mezKil'     =>$mezKil,
                        'mezTip'     =>$mezTip,
                        'mezEst'     =>$mezEst,
                        'mezEstCtl'  =>$mezEstCtl,
                        'mezMaq'     =>$mezMaq,
                        'mezidEta'   =>$mezidEta,
                        'mezprdCod'  =>$mezprdCod,
                        'mezidPrd'   =>$mezidPrd,
                        'mezprdDes'  =>$mezprdDes,
                        'mezTurn'    =>$mezTurn,
                        'mezObs'     => ''
                    ]);

                    if( isset( $affected)){
                       $idMez = $affected->id;
                       foreach($mezProd as $item){
                            MezclaDet::create([
                                   'idMez'      => $idMez,
                                   'empId'      => 1,
                                   'mezdidPrd'  => $item['idPrd'],
                                   'mezdprdCod' => $item['prdCod'],
                                   'mezdprdTip' => $item['prdTip'],
                                   'mezdprdDes' => $item['prdDes'],
                                   'mezdLotIng' => $item['mezLotIng'],
                                   'mezdUso'    => $item['mezdUso'],
                                   'mezdKil'    => $item['mezdKil']
                            ]);
                       }

                     $resources = array(
                        array("error" => "0", 'mensaje' => "Mezcla ingresada manera correcta",
                        'type'=> 'success')
                        );
                    return response()->json($resources, 200);


                    }else{
                        return response()->json('error' , 204);
                    }



            }else{
                return response()->json('error' , 203);
            }


        }
    }

    function mezclaDet(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'name')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                $id   = $item->id;
                $name = $item->name;
            }

            if($id > 0 ){
                $data = $request->all();
                $idMez = $data['idMez'];

                return mezclaDet::select('*')->where('idMez' , $idMez)->get();

            }else{
                return response()->json('error' , 204);
            }
         }
    }

    function confMezcla(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'idRol')->where('token' , $header)->get();
        $rol    = 0;

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                $id   = $item->id;
                $rol  = $item->idRol;
            }
          if($id > 0 ){
                if($rol == 1 || $rol == 2){
                    $affected = Mezcla::where('idMez' , $request->id)->update(['mezEstCtl' => 'A']);
                    if($affected > 0){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Mezcla autorizada de manera correcta",
                            'type'=> 'success')
                            );
                        return response()->json($resources, 200);
                    }else{
                        return response()->json('error', 204);
                    }
                }else{
                    $resources = array(
                        array("error" => "1", 'mensaje' => "No posee privilegio",
                        'type'=> 'danger')
                        );
                    return response()->json($resources , 200);
                }
            }else{
                return response()->json('error' , 204);
            }
         }
    }

    function rechaMezcla(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'idRol')->where('token' , $header)->get();
        $rol    = 0;

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                $id   = $item->id;
                $rol  = $item->idRol;
            }
          if($id > 0 ){
                if($rol == 1 || $rol == 2){
                    $affected = Mezcla::where('idMez' , $request->id)
                                        ->update([
                                                'mezEstCtl' => 'R',
                                                'mezObs' => $request->observaciones,
                                                    ]);
                    if($affected > 0){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Mezcla rechazada de manera correcta",
                            'type'=> 'success')
                            );
                        return response()->json($resources, 200);
                    }else{
                        return response()->json('error', 204);
                    }
                }else{
                    $resources = array(
                        array("error" => "1", 'mensaje' => "No posee privilegio",
                        'type'=> 'danger')
                        );
                    return response()->json($resources , 200);
                }
            }else{
                return response()->json('error' , 204);
            }
         }
    }

    public function filLotSal(Request $request)
    {
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
                $resources = viewMezclas::select('*')->where('lote_salida','like', $data['lote_salida'].'%')->get()->take(10);

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

    public function getSaca(Request $request){
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
                    $resources = Mezcla::select('idMez', 'mezLotSal')
                    ->where('mezTip' , 'S')
                    ->where('mezEstCtl', 'A')
                    ->get();

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
