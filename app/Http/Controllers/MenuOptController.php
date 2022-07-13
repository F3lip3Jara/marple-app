<?php

namespace App\Http\Controllers;

use App\Models\ModuleOpt;
use App\Models\Opciones;
use App\Models\SubOpciones;
use App\Models\User;
use Illuminate\Http\Request;

class MenuOptController extends Controller
{
    public function index(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'idRol')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{

            foreach($val as $item){
                $id  = $item->id;
                $rol = $item->idRol;
                
            }
            if($id > 0 ){

                $datos = Opciones::all()->where('empId' , 1);
                return response()->json($datos , 200);

            }else{
                return response()->json('error' , 203);
            }
        }
    }
    public function indexSOpt(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'idRol')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{

            foreach($val as $item){
                $id  = $item->id;
                $rol = $item->idRol;
                
            }
            if($id > 0 ){

                $datos = SubOpciones::select('idOptSub','optDes','optSDes','optSLink')
                ->join('roles_opt', 'roles_opt_sub.idOpt','=','roles_opt.idOpt')
                ->where('roles_opt_sub.empId' , 1)
                ->get();
                return response()->json($datos , 200);

            }else{
                return response()->json('error' , 203);
            }
        }
        
    }

    public function del(Request $request)
    {
        
    }
    public function update(Request $request)
    {
        
    }
    public function idexfil(Request $request)
    {
            
    }

}
