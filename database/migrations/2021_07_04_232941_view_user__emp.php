<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViewUserEmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // $query = 'CREATE OR REPLACE VIEW usuarios( token, name, email, imgName, idRol, rolDes, emploNom, emploApe, emploFecNac, gerId, gerDes , activado, reinicio ,created_at , id) AS( SELECT a.token, a.name, a.email, c.emploAvatar, a.idRol, b.RolDes, c.emploNom, c.emploApe, c.emploFecNac, c.gerId, d.gerDes , a.activado , a.reinicio ,a.created_at , a.id FROM users a JOIN roles b ON a.idRol = b.idRol LEFT JOIN empleados c ON a.id = c.id LEFT JOIN gerencia d ON c.gerId = d.gerId)';
       // $query = "CREATE OR REPLACE VIEW tblusuarios( id, name, email, rolDes, emploNom, emploApe, emploFecNac, gerDes, activado, reinicio, created_at ) AS( SELECT a.id, a.name, a.email, b.RolDes, c.emploNom, c.emploApe, c.emploFecNac, d.gerDes, CASE WHEN a.activado = 'A' THEN "ACTIVADO" WHEN a.activado = 'D' THEN "DESACTIVADO" END AS 'activado', CASE WHEN a.reinicio = 'S' THEN "SI" WHEN a.reinicio = 'N' THEN "NO" END 'reinicio', a.created_at FROM users a JOIN roles b ON a.idRol = b.idRol LEFT JOIN empleados c ON a.id = c.id LEFT JOIN gerencia d ON c.gerId = d.gerId ORDER BY a.created_at DESC ) ";
      //create or replace VIEW Regiones (`idReg`, `regDes`, `regCod`, `empId`, `idPai`, `created_at`, `updated_at` , paiDes , paiCod) as ( SELECT a.`idReg`, a.`regDes`, a.`regCod`, a.`empId`, a.`idPai`, a.`created_at`, a.`updated_at` , paiDes , paiCod from region a join pais b on a.idPai = b.idPai )
      //CREATE or REPLACE VIEW comunas (`idCom`, `comDes`, `comCod`, `empId`, `idPai`, `idReg`, `created_at`, `updated_at` , paiCod , paiDes , regCod , regDes) AS (SELECT `idCom`, `comDes`, `comCod`, a.`empId`, a.`idPai`, a.`idReg`, a.`created_at`, a.`updated_at` , paicod , paiDes , regCod , regDes from comuna a JOIN region b on a.idReg = b.idReg join pais c on a.idPai = c.idPai )
      //CREATE or REPLACE VIEW ciudades (`idCom`, `comDes`, `comCod`, `empId`, `idPai`, `idReg`, `created_at`, `updated_at` , paiCod , paiDes , regCod , regDes , idCiu , ciuDes , ciuCod) AS (SELECT a.`idCom`, `comDes`, `comCod`, a.`empId`, a.`idPai`, a.`idReg`, a.`created_at`, a.`updated_at` , paicod , paiDes , regCod , regDes , a.idCiu , ciuDes , ciuCod from ciudad a JOIN region b on a.idReg = b.idReg JOIN pais c on a.idPai = c.idPai JOIN comuna d on a.idCom = d.idCom )
      //CREATE or REPLACE VIEW proveedores( id , rut , nombre,nombre_fantasia,giro,pais,region,comuna,ciudad,direccion,numero,telefono ,es_cliente, es_proveedor,mail , activado)AS ( SELECT idPrv ,`prvRut`, `prvNom`, `prvNom2`, `prvGiro`,b.paiDes , c.regDes,d.comDes,e.ciuDes, `prvDir`, `prvNum` , `prvTel`, `prvCli`, `prvPrv`, `prvMail` , prvAct from proveedor a join pais b on a.idPai = b.idPai join region c on a.idReg = c.idReg join comuna d on a.idCom = d.idCom join ciudad e on a.idCiu = e.idCiu )
      //CREATE or REPLACE VIEW proveedores_dir( id,rut ,pais,region,comuna,ciudad,direccion,numero)AS ( SELECT a.idPrvd , f.`prvRut`,b.paiDes , c.regDes,d.comDes,e.ciuDes, `prvdDir`, `prvdNum`from prv_dir_des a join pais b on a.idPai = b.idPai join region c on a.idReg = c.idReg join comuna d on a.idCom = d.idCom join ciudad e on a.idCiu = e.idCiu join proveedor f on a.idPrv = f.idPrv)
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
