<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\viewProveedorDir;
use Illuminate\Http\Request;

class PrvDirController extends Controller
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
                return viewProveedorDir::all();

            }else{
                return response()->json('error' , 203);
            }
        }
    }

}
