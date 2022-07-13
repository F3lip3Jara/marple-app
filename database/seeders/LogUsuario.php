<?php

namespace Database\Seeders;

use App\Models\Etapa;
use App\Models\EtapaDes;
use Illuminate\Database\Seeder;

class LogUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

            
            //1-1
            EtapaDes::create([
                    'idEta' =>1,
                    'etaDesDes' =>'LOGEO DE USUARIO',
                    'etaDesDel' => 'N'
                ]);
            //1-2
            EtapaDes::create([
                    'idEta' =>1,
                    'etaDesDes' =>'INGRESO DE USUARIO',
                    'etaDesDel' => 'N'
                ]);
            //1-3
            EtapaDes::create([
                    'idEta' =>1,
                    'etaDesDes' =>'REINICIO DE USUARIO',
                    'etaDesDel' => 'N'
                ]);
            //1-4
            EtapaDes::create([
                    'idEta' =>1,
                    'etaDesDes' =>'DESHABILITAR USUARIO',
                    'etaDesDel' => 'N'
                ]);
            //1-5
            EtapaDes::create([
                    'idEta' =>1,
                    'etaDesDes' =>'HABILITAR USUARIO',
                    'etaDesDel' => 'N'
                ]);
            //1-6
            EtapaDes::create([
            'idEta' =>1,
            'etaDesDes' =>'INGRESO ROL',
            'etaDesDel' => 'N'
            ]);
            //1-7
            EtapaDes::create([
                    'idEta' =>1,
                    'etaDesDes' =>'ACUALIZAR ROL',
                    'etaDesDel' => 'N'
                ]);
            //1-8
            EtapaDes::create([
                    'idEta' =>1,
                    'etaDesDes' =>'ELIMINAR ROL',
                    'etaDesDel' => 'N'
                ]);
            //2-1       
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO  ETAPA',
                    'etaDesDel' => 'N'
                ]);
            //2-2             
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR ETAPA',
                    'etaDesDel' => 'N'
                ]);
            //2-3      
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR ETAPA',
                    'etaDesDel' => 'N'
                ]);
            //2-4   
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'CARGAR CALENDARIO JUL',
                    'etaDesDel' => 'N'
                ]);  
            //2-5             
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR CALENDARIO JUL',
                    'etaDesDel' => 'N'
                ]);  

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO GERENCIA',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR GERENCIA',
                    'etaDesDel' => 'N'
                ]);              

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR GERENCIA',
                    'etaDesDel' => 'N'
                ]); 
                

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO MONEDA',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR MONEDA',
                    'etaDesDel' => 'N'
                ]);              

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR MONEDA',
                    'etaDesDel' => 'N'
                ]); 

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO PROVEEDOR/CLIENTE',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR PROVEEDOR/CLIENTE',
                    'etaDesDel' => 'N'
                ]);              

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'DESHABILITAR PROVEEDOR/CLIENTE',
                    'etaDesDel' => 'N'
                ]); 
            
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO DIR PROVEEDOR/CLIENTE',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR DIR PROVEEDOR/CLIENTE',
                    'etaDesDel' => 'N'
                ]);              



            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO COLOR',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR COLOR',
                    'etaDesDel' => 'N'
                ]); 

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR COLOR',
                    'etaDesDel' => 'N'
                ]);              

                EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO GRUPO',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR GRUPO',
                    'etaDesDel' => 'N'
                ]);              

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR GRUPO',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO SUB-GRUPO',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR SUB-GRUPO',
                    'etaDesDel' => 'N'
                ]); 

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR SUB-GRUPO',
                    'etaDesDel' => 'N'
                ]);              
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO MATERIAL',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR MATERIAL',
                    'etaDesDel' => 'N'
                ]); 
                EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO UNIDAD MEDIDA',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR UNIDAD MEDIDA',
                    'etaDesDel' => 'N'
                ]); 

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR UNIDAD MEDIDA',
                    'etaDesDel' => 'N'
                ]);    

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO MAQUINA',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR MAQUINA',
                    'etaDesDel' => 'N'
                ]); 

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR MAQUINA',
                    'etaDesDel' => 'N'
                ]);        
                EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'INGRESO MOTIVO',
                    'etaDesDel' => 'N'
                ]);  
                
            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ACTUALIZAR MOTIVO',
                    'etaDesDel' => 'N'
                ]); 

            EtapaDes::create([
                    'idEta' =>2,
                    'etaDesDes' =>'ELIMINAR MOTIVO',
                    'etaDesDel' => 'N'
                ]);     
            }
}