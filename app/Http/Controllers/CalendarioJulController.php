<?php

namespace App\Http\Controllers;

use App\Models\CalendarioJul;
use App\Models\User;
use CalendaJul;
use Carbon\Carbon;
use Error;
use Exception;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\each;

class CalendarioJulController extends Controller
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
                $data = $request->all();
                $ano  = $data['ano'];

                return CalendarioJul::select('*')->where('calAno', $ano)->where('calValor', '!=' , '' )->get();

            }else{
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

                $data = $request->all();

               foreach($data as $item){
                   $ano = $item['ano'];
                   $obj = $item['detalle'];
               }
               foreach($obj as $itemx){
                    $itemx['Dia'];

                    for($i= 1 ; $i<=12 ; $i++){
                        switch($i){
                            case 1 :
                                $calMes   = $i;
                                $calDes   = 'Enero';
                                $calValor =  $itemx['Enero'];
                            break;
                            case 2 :

                                try{
                                    $calMes   = $i;
                                    $calDes   = 'Febrero';
                                    $calValor =  $itemx['Febrero'];
                                }catch(Exception  $e){
                                    $calMes   = $i;
                                    $calDes   = 'Febrero';
                                    $calValor =  '';
                                }

                            break;
                            case 3 :
                                $calMes   = $i;
                                $calDes   = 'Marzo';
                                $calValor =  $itemx['Marzo'];
                            break;
                            case 4 :
                                try{
                                    $calMes   = $i;
                                    $calDes   = 'Abril';
                                    $calValor =  $itemx['Abril'];
                                }catch(Exception $e){
                                    $calMes   = $i;
                                    $calDes   = 'Abril';
                                    $calValor =  '';
                                }
                            break;
                            case 5 :
                                $calMes   = $i;
                                $calDes   = 'Mayo';
                                $calValor =  $itemx['Mayo'];
                            break;
                            case 6 :
                              try{
                                $calMes   = $i;
                                $calDes   = 'Junio';
                                $calValor =  $itemx['Junio'];
                              }catch(Exception $e){
                                $calMes   = $i;
                                $calDes   = 'Junio';
                                $calValor = '';
                              }
                            break;
                            case 7 :
                                $calMes   = $i;
                                $calDes   = 'Julio';
                                $calValor =  $itemx['Julio'];
                            break;
                            case 8 :
                                $calMes   = $i;
                                $calDes   = 'Agosto';
                                $calValor =  $itemx['Agosto'];
                            break;
                            case 9 :
                               try{
                                    $calMes   = $i;
                                    $calDes   = 'Septiembre';
                                    $calValor =  $itemx['Septiembre'];
                               }catch(Exception $e){
                                    $calMes   = $i;
                                    $calDes   = 'Septiembre';
                                    $calValor = '';
                               }
                            break;
                            case 10 :
                                $calMes   = $i;
                                $calDes   = 'Octubre';
                                $calValor =  $itemx['Octubre'];
                            break;
                            case 11:
                                try{
                                    $calMes   = $i;
                                    $calDes   = 'Noviembre';
                                    $calValor =  $itemx['Noviembre'];
                                }catch(Exception $e){
                                    $calMes   = $i;
                                    $calDes   = 'Noviembre';
                                    $calValor = '';
                                }
                            break;
                            case 12 :
                                $calMes   = $i;
                                $calDes   = 'Diciembre';
                                $calValor =  $itemx['Diciembre'];
                            break;
                        }

                        $affected = CalendarioJul::create([
                            'empId' => 1,
                            'calAno'  => $ano,
                            'calMes'  => $calMes,
                            'calMesDes'=> $calDes,
                            'calDia'  => $itemx['Dia'],
                            'calValor'=> $calValor
                        ]);

                       }
               }
                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Calendario ingresado manera correcta",
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


    public function valCal(Request $request){

            $id     = 0;
            $header = $request->header('access-token');
            $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
            $xid    = $request->idCiu;
            $dia    = 0;

            if($header == ''){
                return response()->json('error' , 203);
            }else{
                foreach($val as $item){
                    if($item->activado = 'A'){
                        $id = $item->id;
                    }
                }
                if($id > 0 ){
                $data = $request->all();
                $ano  = $data['ano'];
                $dia  = CalendarioJul::all()->where('calAno', $ano)->take(1);
                return $dia;

                }else{
                    return response()->json('error' , 204);
            }
         }
    }

    public function del(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();


        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id >0){
            $data  = $request->all();

            foreach($data as $item){
                $ano = $item['ano'];
            }

            $affected = CalendarioJul::where('calAno', $ano)->delete();
            if( isset( $affected)){
                $resources = array(
                    array("error" => "0", 'mensaje' => "Calendario eliminado de manera correcta",
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

    public function busUltAno(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();
        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id >0){
            $ano = CalendarioJul::select('calAno')->orderby('idCal' , 'DESC')->take(1)->get();
            return $ano;

        }else{
            return response()->json('error' , 203);
        }
    }

    public function diaJul(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();


        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id >0){
          $fecha = Carbon::now();
          $dia   = CalendarioJul::select('calValor')
                                    ->where('calDia' , $fecha->day)
                                    ->where('calMes' , $fecha->month)
                                    ->where('calAno' , $fecha->year)->get();

            $cod      = '0';

            foreach( $dia as $item){
                try{
                    $calValor = $item->calValor;

                    if($calValor < 100){
                        $calValor = '0'.$item->calValor;
                    }
                    $ano      = substr($fecha->year,-2);
                    $cod      = $calValor.$ano;
                }catch(Error $er){
                    $calValor = '';
                }

            }
            return response()->json($cod , 200);
        }
    }

}
