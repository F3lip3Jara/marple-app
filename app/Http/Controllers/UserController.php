<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use App\Models\viewTblUser;
use App\Models\viewUser;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function authenticateUser(Request $request)
    {
        $data     = $request->all();
        $email    = $data['email'];
        $password = $data['password'];
        $remember = $data['remember'];

        if (Auth::attempt(['name' => $email, 'password' => $password], $remember))
        {
            $token = Str::random(60);
            $user  = Auth::user();

            if($user->activado == 'A'){
                    $idUser= $user->id;
                    User::where('id', $idUser)
                    ->update(['token' => $token ]);


                        $resources =
                            array('id'     => $user->id,
                                'name'     => $user->name,
                                'token'    => $token,
                                'reinicio' => $user->reinicio

                            );

                return response()->json($resources,200);

            }else{
                $resources =array(
                    array("error" => "1", 'mensaje' => "Usuario desactivado",
                    'type'=> 'danger')
                );
                return response()->json($resources, 200);
            }
        }else {
            $resources = array(
                array("error" => "1", 'mensaje' => "El usuario no logeado",
                'type'=> 'danger')
                );
               return response()->json($resources, 200);
        }
    }

    public function trabUsuarios(Request $request){
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
           return $data = viewTblUser::all();
        }else {
            return response()->json('error' , 203);
        }
     }
    }

    public function getUser( Request $request){
        $id     = 0;
        $header = $request->header('access-token');


        if($header == ''){
            return response()->json('error' , 203);
        }else{
            $val    = User::select('token' , 'id', 'activado')->where('token' , $header)->get();

            foreach($val as $item){
                    if($item->activado = 'A'){
                        $id = $item->id;
                    }

            }
            if($id > 0 ){
                $datos = viewUser::select('name', 'imgName','rolDes')->where('token',$header)->get();
                return response()->json($datos , 200)  ;
             }else {
                return response()->json("error" , 203);

             }
        }


    }

    public function setUserSession(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all()->where('token' , $header);
        $data   =  $request->all();

        if($header == ''){
            $resources = array(
                array("error" => "1", 'mensaje' => "Token invalido",
                'type'=> 'danger')
                );
            return response()->json($resources, 200);
        }else{

          if(isset($val)){
                foreach($val as $item){
                    if($item->activado = 'A'){
                        $id   = $item->id;
                        $name = $item->name;
                        $token = $item->token;
                    }
                }

                if($id > 0 ){
                    foreach($data as $itemx){
                        $usuariox =    $itemx['usuario'];
                    }

                    if($usuariox == $name && $header == $token ){
                        $resources = array(
                            array("error" => "99", 'mensaje' => "Usuario valido",
                            'type'=> 'success')
                            );
                        return response()->json($resources, 200);
                    }else{
                        $resources = array(
                            array("error" => "4", 'mensaje' => "Usuario invalido",
                            'type'=> 'danger')
                            );
                        return response()->json($resources, 200);
                    }
                }else{
                    $resources = array(
                        array("error" => "3", 'mensaje' => "Sin datos encontrados",
                        'type'=> 'danger')
                        );
                }
            }else{
                $resources = array(
                    array("error" => "2", 'mensaje' => "Usuario invalido",
                    'type'=> 'danger')
                    );
            }
        }
    }

    public function valUsuario(Request $request){
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
                    $name   = $data['emploName'];
                    $val    = User::select('name')->where('name' , $name)->get();
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

    public function ins_Users(Request $request){

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
                 $data            = request()->all();
                 $name           = $data['empName'];
                 $imgName        = $data['emploAvatar'];
                 $password       = $name;
                 $emploNom       = strtoupper($data['emploNom']);
                 $emploApe       = strtoupper($data['emploApe']);
                 $fecha          = $data['emploFecNac'];
                 $emploFecNac    = $fecha['year'].'-'.$fecha['month'].'-'.$fecha['day'];
                 $idRol          = $data['idRol'];
                 $gerId          = $data['gerId'];

              User::create([
                     'email'    => '',
                     'password' => bcrypt($password),
                     'name'     => $name,
                     'imgName'  => '',
                     'activado' => 'A',
                     'token'    => '',
                     'idRol'    => $idRol,
                     'reinicio' => 'S'

                ]);
                 $id =User::select(['id'])->where('name', $name)->get();
                 foreach ( $id as $item ){
                     $xid = $item['id'];
                 }

                 Empleado::create([
                     'id'          => $xid,
                     'emploNom'    => $emploNom,
                     'emploApe'    => $emploApe,
                     'emploFecNac' => $emploFecNac,
                     'emploAvatar' => $imgName,
                     'empId'       => 1,
                     'gerId'       => $gerId

                 ]);

                 $resources = array(
                    array("error" => "0", 'mensaje' => "Usuario creado de manera correcta",
                    'type'=> 'success')
                    );

                   return response()->json($resources, 200);


             }else{
                $resources = array(
                    array("error" => "1", 'mensaje' => "El usuario ya existe",
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);

             }

       }
     }

     public function up_Password (Request $request){

        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'reinicio')->where('token' , $header)->get();
        $data   = request()->all();

        if($header == ''){
            return response()->json('error' , 203);
        }else{


            foreach($val as $item){
                if($item->activado == 'A'){
                    $id = $item->id;
                    $reinicio = $item->reinicio;
                }
            }


       if($id > 0 ){
            if($reinicio == 'S'){
                User::where('id', $id)
                ->update([
                    'password' => bcrypt($data['password']),
                    'reinicio' => 'N'

                ]);
                $resources = array(
                    array("error" => "0", 'mensaje' => "Password actualizada",
                    'type'=> 'success')
                    );
                   return response()->json($resources, 200);
            }else{
                $resources = array(
                    array("error" => "1", 'mensaje' => "El usuario no está marcado para reinicio".$reinicio,
                    'type'=> 'danger')
                    );
                   return response()->json($resources, 200);
            }
        }else {
            return response()->json('error' , 203);
        }
      }
     }

     public function upUsuario(Request $request){

        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'reinicio')->where('token' , $header)->get();
        $data   = request()->all();

        if($header == ''){
            return response()->json('error' , 203);
        }else{

            foreach($val as $item){
                if($item->activado == 'A'){
                    $id = $item->id;
                }
            }

       if($id > 0 ){
            $xid = $data['id'];

        try{

            $idRol =  intval($data['rol']);
            $idGer =  intval($data['gerencia']);

            if($data['reinicio'] == 'S'){
                User::where('id', $xid)->update([
                    'idRol'   => $idRol,
                    'reinicio'=> $data['reinicio'],
                    'activado'=> $data['activado'],
                    'password' => bcrypt($data['name'])
                    ]);
            }else{
                User::where('id', $xid)->update([
                    'idRol'   => $idRol,
                    'reinicio'=> $data['reinicio'],
                    'activado'=> $data['activado']
                ]);
            }

        $valida = Empleado::where('id', $xid)->update([
            'emploNom'    => $data['emploNom'],
            'emploApe'    => $data['emploApe'],
            'emploFecNac' => $data['emploFecNac'],
            'gerId'       => $idGer
        ]);

        if($valida == 1){
            $resources = array(
                array("error" => "0", 'mensaje' => "Usuario actualizado",
                'type'=> 'success')
                );
            return response()->json($resources, 200);
        }else{
            $resources = array(
                array("error" => "1", 'mensaje' => "Error en el servidor",
                'type'=> 'danger')
                );
            return response()->json($resources, 200);
        }

       }catch(Exception $ex){
           return $ex;
       }
      }else{
        $resources = array(
           array("error" => "1", 'mensaje' => "Usuario desactivado",
           'type'=> 'danger')
           );
       return response()->json($resources, 200);
       }
     }
    }
     function getUsuarios(Request $request){
        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'reinicio')->where('token' , $header)->get();
        $data   = request()->all();
        $xid    = $request->idUser;

        if($header == ''){
            return response()->json('error' , 203);
        }else{


            foreach($val as $item){
                if($item->activado == 'A'){
                    $id = $item->id;
                }
            }


       if($id > 0 ){
            return User::select('idRol' , 'gerId')
                        ->join('empleados', 'users.id', '=', 'empleados.id')
                        ->where('users.id', $xid)->get();
        }

      }
     }

     public function upUsuario2(Request $request){

        $header = $request->header('access-token');
        $val    = User::select('token' , 'id', 'activado', 'reinicio')->where('token' , $header)->get();

        if($header == ''){
            return response()->json('error' , 203);
        }else{

            foreach($val as $item){
                if($item->activado == 'A'){
                    $id = $item->id;
                }
            }

       if($id > 0 ){
        try{

            $data = request()->all();

            foreach($data as $itemx){
                    $imgName =  $itemx['imgName'];
            }


           $valida = Empleado::where('id', $id)->update([
                'emploAvatar' => $imgName
            ]);

         if($valida == 1){
            $resources = array(
                array("error" => "0", 'mensaje' => "Usuario actualizado",
                'type'=> 'success')
                );
            return response()->json($resources, 200);
        }else{
            $resources = array(
                array("error" => "1", 'mensaje' => "Error en el servidor",
                'type'=> 'danger')
                );
            return response()->json($resources, 200);
        }
        }catch(Exception $ex){
            return $ex;
        }
       }else{
        $resources = array(
            array("error" => "1", 'mensaje' => "Usuario desactivado",
            'type'=> 'danger')
            );
        return response()->json($resources, 200);
       }
     }
    }

}
