<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleOpt;
use App\Models\Opciones;
use App\Models\RolesModule;
use App\Models\SubOpciones;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
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
            //$datos = Module::select('*')->where('idRol', $rol)->get();  4
            
            $menu  =RolesModule::select('rol_mod.idMol', 'rol_mod.idRol' , 'roles_module.molDes' , 'roles_module.molIcon')
            ->join('roles_module', 'rol_mod.idMol', '=', 'roles_module.idMol')
            ->where('rol_mod.empId' , 1 )
            ->where('rol_mod.idRol' , $rol )
            ->get();

            $datos = [];

            foreach($menu as $item){
               $id=$item->idMol;

               $opciones = [];

               $opt = ModuleOpt::select('roles_opt.optDes', 'roles_opt.optLink', 'roles_opt.optSub' , 'roles_opt.idOpt' )
                      ->join('roles_opt', 'roles_mod_opt.idOpt', '=', 'roles_opt.idOpt')
                      ->where('idRol',  $rol)
                      ->where('idMol',  $id)
                      ->orderby('idOpt')
                      ->get();  

                      foreach($opt as $itemOpt){
                      
                            $sub = SubOpciones::select( 'optSDes','optSLink')
                            ->where('empId',1)
                            ->where('idOpt' , $itemOpt->idOpt)
                            ->get();

                            $xopt = array(
                                'idOpt' => $itemOpt->idOpt,
                                'optDes' =>$itemOpt->optDes,
                                'optLink'=>$itemOpt->optLink,
                                'optSub' =>$itemOpt->optSub,
                                'sub'    => $sub
                            );

                            array_push($opciones , $xopt);
                            
                      }
            
                $laterMenu =  array("menu" => $item, "opciones" => $opciones);

                 array_push($datos , $laterMenu);
            }
            
            return response()->json($datos , 200);
           
              
           
        }else {
            return response()->json('error' , 203);
        }
      }
    }

    public function indexMod(Request $request){
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

                $datos = Module::all()->where('empId' , 1);
                return response()->json($datos , 200);

            }else{
                return response()->json('error' , 203);
            }
        }
    }

   
    
}
