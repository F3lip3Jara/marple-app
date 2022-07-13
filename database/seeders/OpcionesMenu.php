<?php

namespace Database\Seeders;

use App\Models\Opciones;
use App\Models\SubOpciones;
use Illuminate\Database\Seeder;

class OpcionesMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
    Opciones::create([
        'empId' =>1,
        'optDes'  => 'Usuario.', 
        'optLink' =>'users',
        'optSub'  => 'N'
      ]);
  
      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Roles.', 
        'optLink' =>'roles',
        'optSub'  => 'N'
      ]);

      
    
    Opciones::create([
      'empId' =>1,
      'optDes'  => 'Modulos', 
      'optLink' =>'modulos',
      'optSub'  => 'N'
    ]);

    Opciones::create([
      'empId' =>1,
      'optDes'  => 'Roles-Modulos', 
      'optLink' =>'rol_mod',
      'optSub'  => 'N'
    ]);


    Opciones::create([
      'empId' =>1,
      'optDes'  => 'Roles-Opciones', 
      'optLink' =>'rol_opt',
      'optSub'  => 'N'
    ]);

    Opciones::create([
      'empId' =>1,
      'optDes'  => 'Opciones', 
      'optLink' =>'opt',
      'optSub'  => 'N'
    ]);

    Opciones::create([
      'empId' =>1,
      'optDes'  => 'Sub-Opciones', 
      'optLink' =>'sopt',
      'optSub'  => 'N'
    ]);

  
    Opciones::create([
        'empId' =>1,
        'optDes'  => 'Etapas.', 
        'optLink' =>'etapas',
        'optSub'  => 'N'
     ]);
  
      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Log de Sistema.', 
        'optLink' =>'logsys',
        'optSub'  => 'N'
      ]);
  
      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Correlativo bins.', 
        'optLink' =>'binCol',
        'optSub'  => 'N'
      ]);
  
      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Calendario Jul.', 
        'optLink' =>'calJul',
        'optSub'  => 'N'
      ]);
  
      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Empresa.', 
        'optLink' =>'empresa',
        'optSub'  => 'N'
      ]);
  
      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Gerencia.', 
        'optLink' =>'gerencia',
        'optSub'  => 'N'
      ]);
  

  
    $idOpt =Opciones::create([
        'empId'   =>1,
        'optDes'  => 'Geolocalización.', 
        'optLink' =>'',
        'optSub'  => 'S'
      ]);
  
     SubOpciones::create([
      'idOpt' => $idOpt->id,
      'empId' =>1,
      'optSDes'=>'País',
      'optSLink'=>'pais'
     ]);
  
     SubOpciones::create([
      'idOpt' =>  $idOpt->id,
      'empId' =>1,
      'optSDes'=>'Región',
      'optSLink'=>'regiones'
     ]);
  
     SubOpciones::create([
      'idOpt' => $idOpt->id,
      'empId' =>1,
      'optSDes'=>'Ciudad',
      'optSLink'=>'ciudad'
     ]);
  
     SubOpciones::create([
      'idOpt' =>  $idOpt->id,
      'empId' =>1,
      'optSDes'=>'Comuna',
      'optSLink'=>'comuna'
     ]);
  
     
  
      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Moneda.', 
        'optLink' =>'moneda',
        'optSub'  => 'N'
      ]);

      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Motivo.', 
        'optLink' =>'motivo',
        'optSub'  => 'N'
      ]);

      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Proveedor', 
        'optLink' =>'proveedor',
        'optSub'  => 'N'
      ]);
  
      $idOpt =Opciones::create([
        'empId' =>1,
        'optDes'  => 'Material.', 
        'optLink' =>'',
        'optSub'  => 'S'
      ]);


      SubOpciones::create([
        'idOpt' => $idOpt->id,
        'empId' =>1,
        'optSDes'=>'Color',
        'optSLink'=>'color'
       ]);

       SubOpciones::create([
        'idOpt' => $idOpt->id,
        'empId' =>1,
        'optSDes'=>'Grupo',
        'optSLink'=>'grupo'
       ]);

       SubOpciones::create([
        'idOpt' => $idOpt->id,
        'empId' =>1,
        'optSDes'=>'Sub Grupo',
        'optSLink'=>'subgrupo'
       ]);
      
       SubOpciones::create([
        'idOpt' => $idOpt->id,
        'empId' =>1,
        'optSDes'=>'Productos',
        'optSLink'=>'productos'
       ]);

       SubOpciones::create([
        'idOpt' => $idOpt->id,
        'empId' =>1,
        'optSDes'=>'Unidad Medida',
        'optSLink'=>'unidad'
       ]);
      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Maquina.', 
        'optLink' =>'maquinas',
        'optSub'  => 'N'
      ]);
  
 
        Opciones::create([
        'empId' =>1,
        'optDes'  => 'Mezcla.', 
        'optLink' =>'mezcla',
        'optSub'  => 'N'
      ]);

     Opciones::create([
        'empId' =>1,
        'optDes'  => 'Extrusión.', 
        'optLink' =>'extrusion',
        'optSub'  => 'N'
      ]);


    
      Opciones::create([
        'empId' =>1,
        'optDes'  => 'OP.', 
        'optLink' =>'op',
        'optSub'  => 'N'
      ]);

      Opciones::create([
        'empId' =>1,
        'optDes'  => 'Termoformado.', 
        'optLink' =>'Ot_Ter',
        'optSub'  => 'N'
      ]);
    }
}
