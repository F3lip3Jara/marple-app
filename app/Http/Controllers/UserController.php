<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\viewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;


class UserController extends Controller
{
    public function authenticateUser(Request $request)
    {
        $data     = $request->all();
        $email    = $data['email'];
        $password = $data['password'];
        $remember = $data['remember'];

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember))
        {
            $token = Str::random(60);
            $user  = Auth::user();
            $idUser= $user->id;
            User::where('id', $idUser)
            ->update(['token' => $token ]);

            $userlog = User::all(['id', 'name' , 'email', 'token'])->where('id' , $user->id);

            return response()->json($userlog,201);
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
        $val    = User::all(['id' , 'token' ])->where('token', $header );

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id > 0 ){
           return $data = User::all();
        }else {
            return response()->json('error' , 203);
        }

    }

    public function getUser( Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id > 0 ){
            return $data = viewUser::all()->where('token',$header);
         }else {
             return response()->json('error' , 203);
         }

    }

    public function setUserSession(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }


    }
}
