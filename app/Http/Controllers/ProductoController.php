<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use App\Models\viewProductos;
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
               return viewProductos:: all()->take(1000);
            }else {
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
                $affected = Producto::where('idPrd' , $request->idPrd)->update([
                    'prdEan'   => $request->prdEan,
                    'prdCod'   => $request->prdCod,
                    'prdDes'   => $request->prdDes,
                    'prdObs'   => $request->prdObs,
                    'prdRap'   => substr($request->prdCod , 0 , 6),
                    'prdTip'   => $request->prdTip,
                    'prdCost'  => $request->prdCost,
                    'prdNet'   => $request->prdNet,
                    'prdBrut'  => $request->prdBrut,
                    'prdInv'   => $request->prdInv,
                    'prdPes'   => $request->prdPes,
                    'prdMin'   => $request->prdMin,
                    'idMon'    => $request->idMon,
                    'idGrp'    => $request->idGrp,
                    'idSubGrp' => $request->idSubGrp,
                    'idUn'     => $request->idUn,
                    'idCol'    => $request->idCol
                ]);

                if($affected > 0){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Producto actualizado manera correcta",
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
                $affected = Producto::create([
                    'prdEan'   => $request->prdEan,
                    'prdCod'   => $request->prdCod,
                    'prdDes'   => $request->prdDes,
                    'prdObs'   => $request->prdObs,
                    'prdRap'   => substr($request->prdCod , 0 , 6),
                    'prdTip'   => $request->prdTip,
                    'prdCost'  => $request->prdCost,
                    'prdNet'   => $request->prdNet,
                    'prdBrut'  => $request->prdBrut,
                    'prdInv'   => $request->prdInv,
                    'prdPes'   => $request->prdPes,
                    'prdMin'   => $request->prdMin,
                    'idMon'    => $request->idMon,
                    'idGrp'    => $request->idGrp,
                    'idSubGrp' => $request->idSubGrp,
                    'idUn'     => $request->idUn,
                    'idCol'    => $request->idCol
                ]);

                if( isset( $affected)){
                    $resources = array(
                        array("error" => "0", 'mensaje' => "Producto ingresado manera correcta",
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

    public function del(Request $request)
    {
    }

    public function valCodPrd(Request $request){
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
                    $prdCod = $data['prdCod'];


                    $val    = Producto::select('prdCod')->where('prdCod' , $prdCod)->get();
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

    public function valEanPrd(Request $request){
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
                    $prdEan   = $data['prdEan'];
                    $val    = Producto::select('prdEan')->where('prdEan' , $prdEan)->get();
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

     public function filPrdDes(Request $request)
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
                $resources = viewProductos::select('*')->where('descripcion',$data['prdDes'])->get();

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


    public function filPrdCod(Request $request)
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
                $resources = viewProductos::select(['id', 'cod_pareo' , 'descripcion'])->where('cod_pareo','like', $data['prdCod'].'%')->get()->take(10);

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



   public function prdDes (Request $request){
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
                return Producto::select('prdDes')->get();
        }
    }
   }

   public function datPrd(Request $request){
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
                $idPrd = $data['idPrd'];
                return Producto::select('*')->where('idPrd', $idPrd)->get();
            }
        }
   }

   public function datPrdMtP(Request $request){
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
                return Producto::select('idPrd', 'prdCod','prdDes' , 'prdTip')
                ->where('prdTip', 'M')
                ->orWhere('prdTip','=', 'B')
                ->orWhere('prdTip','=', 'V')
                ->get();

            }
        }
   }


   public function prodTerm(Request $request){
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
               return Producto::select('idPrd', 'prdCod', 'prdDes')
               ->where('prdTip',  'P')
               ->get();

           }
       }
  }

  public function prodInsumo(Request $request){
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
               return Producto::select('idPrd', 'prdCod', 'prdDes')
               ->where('prdTip',  'I')
               ->get();

           }
       }
  }





}
