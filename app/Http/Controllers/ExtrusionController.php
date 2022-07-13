<?php

namespace App\Http\Controllers;

use App\Models\Extrusion;
use App\Models\ExtrusionDet;
use App\Models\User;
use App\Models\viewExtrusion;
use Carbon\Carbon;
use Error;
use Extursion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExtrusionController extends Controller
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
                return viewExtrusion::all()->take(3000);
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
                    $data      = $request->all();
                    $extUsu    = $name;

                    foreach($data as $item){
                        $extMaq    = $item['extMaq'];
                        $extTurn   = $item['extTurn'];
                        $diaJul    = $item['diaJul'];
                        $extIdMez  = $item['extMez'];
                    }

                     $fecha    = Carbon::now()->format('Y-m-d');
                     $count    = Extrusion::select("*")
                     ->where('extTurn', $extTurn)
                     ->where('extMaq' , $extMaq)
                     ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), "=", $fecha)
                     ->count();

                     if($count == 0){
                        $count  = 1;
                        $digito = '0'.strval($count);
                    }else{
                        $count  = $count + 1;
                       if($count >= 10){
                           $digito = strval($count);
                        }else{
                           $digito = '0'.strval($count);
                        }
                    }


                     $extLotSa  = $extMaq.'0'.$extTurn.$diaJul.$digito;

                    $affected = Extrusion::create([
                        'empId'      => 1,
                        'extUsu'     => $extUsu,
                        'extLotSal'  => $extLotSa,
                        'extEstCtl'  =>'P',
                        'extEst'     =>'P',
                        'extMaq'     =>$extMaq,
                        'extTurn'    =>$extTurn,
                        'extIdMez'   =>$extIdMez
                    ]);

                   if(isset( $affected)){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Extrusión generada manera correcta",
                                   'type' => 'success',
                                   'data' => array(
                                                array(
                                                    'extLotSal'=> $extLotSa,
                                                    'idExt'   => $affected->id
                                                )
                                             )
                                 )
                            );
                        return response()->json($resources, 200);
                    }else{
                        return response()->json('error', 204);
                    }
            }else{
                return response()->json('error' , 203);
            }
        }
    }

    public function insConfirma(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'name', 'idRol')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                $id   = $item->id;
                $name = $item->name;
                $rol  = $item->idRol;
            }

            if($id > 0 ){
                    $data      = $request->all();
                    $extUsu    = $name;

                    foreach($data as $item){
                        $idExt     =  $item['idExt'];
                        $extAnbob  =  $item['extAnbob'];
                        $extFor    =  $item['extFor'];
                        $extDet    =  $item['extrusionDet'];
                        $idEta     =  $item['idEta'];
                        $producto  =  $item['producto'];
                    }

                    $extIdPrd  = 0;
                    $extPrdCod = '';
                    $extPrdDes = '';

                    try{
                        if(sizeof($producto) > 0 ){

                            $extIdPrd  = $producto['idPrd'];
                            $extPrdCod = $producto['prdCod'];
                            $extPrdDes = $producto['prdDes'];
                        }
                    }catch(Error $error){
                        $extIdPrd  = 0;
                        $extPrdCod = '';
                        $extPrdDes = '';
                     }
                    $affected = Extrusion::where('idExt' , $idExt)
                                        ->update(['extEst'   => 'A',
                                                  'extAnbob' => $extAnbob,
                                                  'extFor'   => $extFor,
                                                  'extidEta' => $idEta,
                                                  'extIdPrd' => $extIdPrd,
                                                  'extPrdCod'=> $extPrdCod,
                                                  'extPrdDes'=> $extPrdDes
                                                ]);

                    if($rol <> 4){
                        $extdTip = 'J';
                    }else{
                        $extdTip = 'O';
                    }

                    if ($affected > 0){
                        foreach($extDet as $item){
                            ExtrusionDet::create([
                                   'idExt'      => $idExt,
                                   'empId'      => 1,
                                   'extdIzq'    => $item['extdIzq'],
                                   'extdCen'    => $item['extdCen'],
                                   'extdDer'    => $item['extdDer'],
                                   'extdEst'    => 'A',
                                   'extdHorIni' => $item['extdHorIni'],
                                   'extdHorFin' => $item['extdHorFin'],
                                   'extdUso'    => $extUsu,
                                   'extdRol'    => $rol,
                                   'extdObs'    => $item['extdObs'],
                                   'extdTip'   => $extdTip
                            ]);
                       }
                    }

                   if(isset( $affected)){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Extrusión generada manera correcta",
                                   'type' => 'success'

                                 )
                            );
                        return response()->json($resources, 200);
                    }else{
                        return response()->json('error', 204);
                    }
            }else{
                return response()->json('error' , 203);
            }
        }
    }


    function confExtru(Request $request){
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
                $data = $request->all();
               if($rol == 1 || $rol == 2){
                    $affected = Extrusion::where('idExt' , $data['id'])->update([
                        'extEstCtl' => 'A',                        
                        'extObs'    => $data['extObs']
                    ]);
                    if($affected > 0){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Extrusión autorizada de manera correcta",
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

    function confExtruO(Request $request){
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
                $data = $request->all();
               if($rol == 1 || $rol == 2 ){
                    $affected = Extrusion::where('idExt' , $data['id'])->update([
                        'extKilApr' => $data['extKilApr'],
                        'extKilR'   => $data['extKilR'],
                        'extObs'    => $data['extObs']
                    ]);
                    if($affected > 0){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Extrusión actualizada de manera correcta",
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
                $resources = viewExtrusion::select('*')->where('lote_bobina','like', $data['lote_salida'].'%')->get()->take(10);

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

    public function indexFil(Request $request)
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
                $data         = request()-> all();
                $extrusion    = Extrusion::select('*')->where('idExt', $data['idExt'])->get()->take(1);
                $extrusionDet = ExtrusionDet::select('extdCen' , 'extdDer' , 'extdEst' ,'extdHorFin','extdHorIni' , 'extdIzq','extdObs')->where('idExt', $data['idExt'])->get();

                $resources    =array(
                                 "extrusion" => $extrusion,
                                 'extrusionDet'=> $extrusionDet
                    );


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

    function extDet(Request $request){
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
                $idExt = $data['idExt'];

                return ExtrusionDet::select('*')->where('idExt' , $idExt)->get();

            }else{
                return response()->json('error' , 204);
            }
         }
    }

    public function insConfirmaO(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'name', 'idRol')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                $id   = $item->id;
                $name = $item->name;
                $rol  = $item->idRol;
            }

            if($id > 0 ){
                    $data      = $request->all();
                    $extUsu    = $name;

                    foreach($data as $item){
                        $idExt     =  $item['idExt'];
                        $extAnbob  =  $item['extAnbob'];
                        $extFor    =  $item['extFor'];
                        $extDet    =  $item['extrusionDet'];
                        $idEta     =  $item['idEta'];
                        $producto  =  $item['producto'];
                    }

                    $extIdPrd  = 0;
                    $extPrdCod = '';
                    $extPrdDes = '';

                    try{
                        if(sizeof($producto) > 0 ){

                            $extIdPrd  = $producto['idPrd'];
                            $extPrdCod = $producto['prdCod'];
                            $extPrdDes = $producto['prdDes'];
                        }
                    }catch(Error $error){
                        $extIdPrd  = 0;
                        $extPrdCod = '';
                        $extPrdDes = '';
                     }
                    $affected = Extrusion::where('idExt' , $idExt)
                                        ->update(['extEst'   => 'A',
                                                  'extAnbob' => $extAnbob,
                                                  'extFor'   => $extFor,
                                                  'extidEta' => $idEta,
                                                  'extIdPrd' => $extIdPrd,
                                                  'extPrdCod'=> $extPrdCod,
                                                  'extPrdDes'=> $extPrdDes
                                                ]);

                    if ($affected > 0){

                        $affected = ExtrusionDet::where('idExt', $idExt)->delete();

                        if($rol <> 4){
                            $extdTip = 'J';
                        }else{
                            $extdTip = 'O';
                        }

                        foreach($extDet as $item){
                            ExtrusionDet::create([
                                   'idExt'      => $idExt,
                                   'empId'      => 1,
                                   'extdIzq'    => $item['extdIzq'],
                                   'extdCen'    => $item['extdCen'],
                                   'extdDer'    => $item['extdDer'],
                                   'extdEst'    => 'A',
                                   'extdHorIni' => $item['extdHorIni'],
                                   'extdHorFin' => $item['extdHorFin'],
                                   'extdUso'    => $extUsu,
                                   'extdRol'    => $rol,
                                   'extdObs'    => $item['extdObs'],
                                   'extdTip'    =>  $extdTip
                            ]);
                       }
                    }

                   if(isset( $affected)){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Extrusión generada manera correcta",
                                   'type' => 'success'

                                 )
                            );
                        return response()->json($resources, 200);
                    }else{
                        return response()->json('error', 204);
                    }
            }else{
                return response()->json('error' , 203);
            }
        }
    }
    public function insConfirmaC(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'name', 'idRol')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{
            foreach($val as $item){
                $id   = $item->id;
                $name = $item->name;
                $rol  = $item->idRol;
            }
            if($id > 0 ){
                    $data      = $request->all();
                    $extUsu    = $name;

                    foreach($data as $item){
                        $idExt     =  $item['idExt'];
                        $extDet    =  $item['extrusionDet'];
                    }

                        $affected = ExtrusionDet::where('idExt', $idExt)->delete();

                        if($rol <> 4){
                            $extdTip = 'J';
                        }else{
                            $extdTip = 'O';
                        }

                        foreach($extDet as $item){
                            ExtrusionDet::create([
                                   'idExt'      => $idExt,
                                   'empId'      => 1,
                                   'extdIzq'    => $item['extdIzq'],
                                   'extdCen'    => $item['extdCen'],
                                   'extdDer'    => $item['extdDer'],
                                   'extdEst'    => 'A',
                                   'extdHorIni' => $item['extdHorIni'],
                                   'extdHorFin' => $item['extdHorFin'],
                                   'extdUso'    => $extUsu,
                                   'extdRol'    => $rol,
                                   'extdObs'    => $item['extdObs'],
                                   'extdTip'    =>  $extdTip
                            ]);
                       }                    }

                   if(isset( $affected)){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Extrusión generada manera correcta",
                                   'type' => 'success'

                                 )
                            );
                        return response()->json($resources, 200);
                    }else{
                        return response()->json('error', 204);
                    }
            }
        }

    public function rechaExtru (Request $request){
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
                    $data = $request->all();

                    $affected = Extrusion::where('idExt' , $request->id)->update(['extEstCtl' => 'R',
                                                                                  'extObs'    => $data['extObs'],
                                                                                  'extIdMot'  => $data['idMot']                                                                                 
                                                                                ]);
                    if($affected > 0){
                        $resources = array(
                            array("error" => "0", 'mensaje' => "Extrusión rechazada de manera correcta",
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

    public function extruDis(Request $request){
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

                $data = $request->all();


             return Extrusion::all()
                                ->where('extEstCtl', 'A')
                                ->where('extidEta'  , $data['idEta'])
                                ->take(3000);
            }else {
                return response()->json('error' , 203);
            }
        }
    }

}
