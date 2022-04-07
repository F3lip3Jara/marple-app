<?php

namespace App\Http\Controllers;

use App\Models\BinCol;
use App\Models\User;
use Illuminate\Http\Request;

class BinController extends Controller
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
                return BinCol::all()->take(1);

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

                $data = $request->all();

                $affected = BinCol::where('idColb' , 1)->update([
                    'colbnum' =>   $data['id']
                    ]);


                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Correlativo actualizado manera correcta",
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


    public function getIdBin(Request $request){

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
                $colbnum = BinCol::select('colbnum')->take(1)->get();
                $bin     = $colbnum + 1;
                $affected = BinCol::where('idColb' , 1)->update([
                    'colbnum' =>   $bin
                ]);


                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Problemas en correlativo",
                        'type'=> 'success')
                        );
                }else{
                        return $bin;
                }

            }else{
                return response()->json('error' , 203);
            }
        }

    }
}
