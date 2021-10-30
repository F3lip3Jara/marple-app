<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
       /* $data   = request()->header();
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );
        foreach($val as $item){
            $id = $item->id;
        }
        if($id > 0 ){
            return Producto:: all()->take(100);
        }else {
            return response()->json('error' , 203);
        }*/
        set_time_limit(0);
        return Producto:: all()->take(1000000);
    }

    public function index1( Request $request )
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id > 0 ){
            $data = Producto::where('prdDes' , $request->prdDes)->get();

            if(count($data) == 0){
                return response()->json("error", 406);
            }else{
                return $data;
            }

        }else {
            return response()->json('error' , 203);
        }
    }

    public function filtorCod(Request $request){
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }
        if($id > 0 ){
            return Producto::all('prdDes');
        }else {
            return response()->json('error' , 203);
        }
    }


    public function update(Request $request)
    {
        $id     = 0;
        $header = $request->header('access-token');
        $val    = User::all(['id' , 'token' ])->where('token', $header );

        foreach($val as $item){
            if($item->activado = 'A'){
                $id = $item->id;
            }
        }

        if($id > 0 ){
            $affected = Producto::where('idPrd' , $request->idPrd)->update(['prdDes' => $request->prdDes]);

            if($affected > 0){
                return response()->json('OK', 200);
            }else{
                $resources = array(
                    array("error" => "1", 'mensaje' => "No se encuentra registro" ,'type'=> 'warning')
                    );
                   return response()->json($resources, 200);
            }
        }else {
                return response()->json('error' , 203);
        }
    }


    public function destroy(Producto $producto)
    {

    }
}
