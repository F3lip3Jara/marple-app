<?php

namespace Database\Seeders;

use App\Models\BinCol;
use App\Models\Ciudad;
use App\Models\Color;
use App\Models\Comuna;
use App\Models\Roles;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Etapa;
use App\Models\EtapaDes;
use App\Models\Grupo;
use App\Models\Module;
use App\Models\ModuleOpt;
use App\Models\Moneda;
use App\Models\Opciones;
use App\Models\Pais;
use App\Models\Proveedor;
use App\Models\Region;
use App\Models\RolesModule;
use App\Models\SubGrupo;
use App\Models\SubOpciones;
use App\Models\UnidadMed;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Etapa::create(['etaDes' => 'SEGURIDAD' ,
                'etaProd'=> 'N']);

        Etapa::create(['etaDes' => 'PARAMETROS' ,
                'etaProd'=> 'N']);

        Etapa::create(['etaDes' => 'MEZCLA' ,
                'etaProd'=> 'S']);

        Etapa::create(['etaDes' => 'EXTRUSIÓN' ,
                'etaProd'=> 'S']);

        Roles::create([
          'idRol' => 1,
          'rolDes' =>'SUPER'
        ]);
        
        Roles::create([
            'idRol' => 2,
            'rolDes' =>'ADMINISTRADOR'
        ]);
        
        Roles::create([
            'idRol' => 3,
            'rolDes' =>'JEFE PRODUCCIÓN'
        ]);

        Roles::create([
            'idRol' => 4,
            'rolDes' =>'CALIDAD'
        ]);
        
        Roles::create([
            'idRol' => 5,
            'rolDes' =>'OPERADOR'
        ]);

        User::create([
            'name'       => 'SUPER',
            'email'      => 'adm@contacto.cl',
            'idRol'     => 1,
            'activado'  => 'A',
            'imgName'   => '',
            'token'     => '',
            'password'  => bcrypt('admin')
         ]);
         User::create([
            'name'       => 'ADMINISTRADOR',
            'email'      => 'adm@contacto.cl',
            'idRol'     => 2,
            'activado'  => 'A',
            'imgName'   => '',
            'token'     => '',
            'password'  => bcrypt('admin')
        ]);

        Empresa::create([
            'empId'  => 1,
            'empDes'  =>'MARPLE PLASTIC SOLUTION GROUP S.A.',
            'empDir'  =>'Santa Marta N°1051 Maipú - Santiago',
            'empRut'  =>'76.350.147-7',
            'empGiro' =>'Fabricación y Comercialización de Artículos de Plástico',
            'empFono' => '(02) 25308702'
          ]);

        Moneda::create([
            'monCod' => 'CLP',
            'monDes' => 'PESO CHILENO',
            'empId'  =>1
        ]);

        Moneda::create([
            'monCod' => '\S',
            'monDes' => 'SOLES PERUANO',
            'empId'  =>1
        ]);

       
        BinCol::create([
            'empId'   => 1,
            'colbnum' => 400
        ]);

        UnidadMed::create([
            'empId' => 1,
            'unDes' =>'KILOS',
            'unCod' =>'KG'
        ]);
        
        UnidadMed::create([
            'empId' => 1,
            'unDes' =>'GRAMOS',
            'unCod' =>'GR'
        ]);

        UnidadMed::create([
            'empId' => 1,
            'unDes' =>'UNIDAD',
            'unCod' =>'UN'
        ]);

        //COLORES
        $json = file_get_contents("database/data_prd/Color.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Color::create(array(
                'colCod' => $obj->ColCod,
                'colDes' => $obj->ColDes,
                'empId'  => 1                
            ));
        }

        //ETAPAS_DES
        $json = file_get_contents("database/data_prd/Etapas.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            EtapaDes::create(array(
                'idEta'     => $obj->idEta,
                'etaDesDes' => $obj->etaDesDes,
                'etaDesDel' => $obj->etaDesDel                
            ));
        }

    //OPCIONES
    $json = file_get_contents("database/data_prd/Opciones.json");
    $data = json_decode($json);
    foreach ($data as $obj) {
        Opciones::create(array(
            'empId'    => $obj->empId,
            'optDes'   => $obj->optDes,
            'optSub'   => $obj->optSub, 
            'optLink'  => $obj->optLink              
        ));
    }

    //Sub Opciones
    $json = file_get_contents("database/data_prd/Sub_Opt.json");
    $data = json_decode($json);
    foreach ($data as $obj) {
        SubOpciones::create(array(
            'empId'     => $obj->empId,
            'idOpt'     => $obj->idOpt,
            'optSDes'   => $obj->optSDes, 
            'optSLink'  => $obj->optSLink              
        ));
    }

     //PAIS
     $json = file_get_contents("database/data_prd/Pais.json");
     $data = json_decode($json);
     foreach ($data as $obj) {
         Pais::create(array(
             'paiCod'     => $obj->Cod_Pais,
             'paiDes'     => $obj->Pais_Des,
             'empId'      => 1               
         ));
     }

     $json = file_get_contents("database/data_prd/Region.json");
     $data = json_decode($json);
 
     foreach ($data as $obj) {
         $idPai = Pais::select('idPai')->where('paiCod' , $obj->PaiCod)->get();
         $xidPai = 0;
         foreach($idPai as $item){
                 $xidPai = $item->idPai;
         }
         Region::create(array(
             'empId'  => 1,
             'idPai'  => $xidPai, 
             'regCod' => $obj->RegCod,
             'regDes' => $obj->RegDes
         ));
       }

       $json = file_get_contents("database/data_prd/Ciudad.json");
       $data = json_decode($json);
   
       foreach ($data as $obj) {
           $idPai = Region::select('pais.idPai', 'region.idReg')
           ->join('pais', 'pais.idPai' , '=' , 'region.idPai')
           ->where('paiCod' , $obj->PaiCod )
           ->where('regCod' , $obj->RegCod )
           ->get();

           $xidPai = 0;
           $idReg = 0;
           foreach($idPai as $item){
                   $xidPai = $item->idPai;
                   $idReg  = $item->idReg;
           }
           Ciudad::create(array(
               'empId'  => 1,
               'idPai'  => $xidPai, 
               'idReg'  => $idReg,
               'ciuCod' => $obj->CiuCod,
               'ciuDes' => $obj->CiuDes
           ));
         }
        
         $json = file_get_contents("database/data_prd/Comuna.json");
         $data = json_decode($json);
     
         foreach ($data as $obj) {
             $idPai = Ciudad::select('pais.idPai', 'region.idReg', 'ciudad.idCiu')
             ->join('pais', 'pais.idPai' , '=' , 'ciudad.idPai')
             ->join('region', 'region.idReg' , '=' , 'ciudad.idReg')           
             ->where('paiCod' , $obj->PaiCod )
             ->where('regCod' , $obj->RegCod )
             ->where('ciuCod' , $obj->CiuCod )
             ->get();

             $xidPai = 0;
             $idReg = 0;
             $idCiu = 0;
             foreach($idPai as $item){
                     $xidPai = $item->idPai;
                     $idReg  = $item->idReg;
                     $idCiu  = $item->idCiu;
             }
             Comuna::create(array(
                 'empId'  => 1,
                 'idPai'  => $xidPai, 
                 'idReg'  => $idReg,
                 'idCiu'  => $idCiu,
                 'comCod' => $obj->ComCod,
                 'comDes' => $obj->ComDes
             ));
           } 

           $json = file_get_contents("database/data_prd/Proveedor.json");
           $data = json_decode($json);
       
           foreach ($data as $request) {
          
      
          $comCod = strval($request->ComCod);
          $comCod = trim($comCod);
          $datos = Comuna::select('idPai', 'idReg', 'idCiu', 'idCom')
          ->where('comCod', $comCod )->get();
  
            
          foreach($datos as $item){
              $idPai = $item->idPai;
              $idReg = $item->idReg;           
              $idCiu = $item->idCiu;
              $idCom = $item->idCom;  
          }
          Proveedor::create([
              'empId'    => 1,
              'prvRut'   => $request->PRVRUT,
              'prvNom'   => $request->PrvNom,
              'prvNom2'  => $request->PrvNom2,
              'prvGiro'  => strval($request->PrvGiro),
              'prvDir'   => $request->PrvDir,
              'prvNum'   => $request->PrvNum,
              'prvTel'   => $request->PrvTel,
              'prvMail'  => $request->PrvMail,
              'prvCli'   => $request->prvCli,
              'prvPrv'   => $request->prvPrv,
              'idPai'    => $idPai,
              'idReg'    => $idReg,
              'idCom'    => $idCom,
              'idCiu'    => $idCiu,
              'prvAct'   => 'S'
           ]);         
          }
        

        //views
        DB::unprepared(file_get_contents('database/sqlviews/create-view-template.sql'));  
        

        //Menu Administrador

        Module::create([
            'empId' => 1,
            'molDes' => 'Seguridad',
            'molIcon'=>'nav-icon fas fa-shield-alt'
        ]);
  
        Module::create([
          'empId' =>1,
          'empId' => 1,
          'molDes' => 'Parámetros',
          'molIcon'=>'nav-icon fas fa-tachometer-alt'
      ]);
  
      Module::create([
        'empId' =>1,
        'empId' => 1,
        'molDes' => 'Producción',
        'molIcon'=>'nav-icon fas fa-industry'
      ]);
      
       RolesModule::create([
      
        'empId'=>1,
        'idRol'=>1,
        'idMol'=>1
          ]); 
          
        RolesModule::create([
      
            'empId'=>1,
            'idRol'=>1,
            'idMol'=>2
        ]);  

        RolesModule::create([      
            'empId'=>1,
            'idRol'=>1,
            'idMol'=>3
        ]); 
              
        RolesModule::create([          
                'empId'=>1,
                'idRol'=>2,
                'idMol'=>1
        ]); 
        RolesModule::create([          
            'empId'=>1,
            'idRol'=>2,
            'idMol'=>2
        ]);  
        RolesModule::create([          
            'empId'=>1,
            'idRol'=>2,
            'idMol'=>3
        ]); 


        $json = file_get_contents("database/data_prd/Menu.json");
        $data = json_decode($json);
    
        foreach ($data as $request) {
            ModuleOpt::create([          
                'empId'=>1,
                'idRol'=>$request->idRol,
                'idMol'=>$request->idMol,
                'idOpt'=>$request->idOpt
            ]); 
        }   
  }
}
