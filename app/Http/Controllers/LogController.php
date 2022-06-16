<?php

namespace App\Http\Controllers;

use App\Models\LogSys;
use App\Models\User;
use Illuminate\Http\Request;


class LogController extends Controller
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
                return LogSys:: all();
            }else {
                return response()->json('error' , 203);
            }
        }
    }

    public function ins(Request $request)
    {
        $data     = $request->all();
        $header   = $request->header('access-token');


        if($data['lgName']== ''){

            $val    = User::select('token' , 'id', 'activado', 'name')->where('token' , $header)->get();
            foreach($val as $item){
                $id    = $item->id;
                $name  = $item->name;
            }

            if($id > 0 ){
                    $affected    = LogSys::create([
                    'empId'      => 1,
                    'idEta'      => $data['idEta'],
                    'idEtaDes'   => $data['idEtaDes'],
                    'lgId'       => $id,
                    'lgName'     => $name,
                    'lgDes'      => $data['lgDes'],
                    'lgDes1'     => $data['lgDes1'],
                    'lgTip'      => 1
                    ]);

                    return response()->json('save' , 200);
            }else{
                return response()->json('error' , 203);
            }
        }else{
               $lgID     = User::all()->where('name' , $data['lgName']);
               foreach($lgID as $item){
                 $id=  $item->id;
                }
               if($id > 0){
                    $affected    = LogSys::create([
                        'empId'      => 1,
                        'idEta'      => $data['idEta'],
                        'idEtaDes'   => $data['idEtaDes'],
                        'lgId'       => $id,
                        'lgName'     => $data['lgName'],
                        'lgDes'      => $data['lgDes'],
                        'lgDes1'     => $data['lgDes1'],
                        'lgTip'      => 1
                        ]);
                        return response()->json('save' , 200);
                }else{
                    return response()->json('error' , 203);
                }

            }

    }
}
