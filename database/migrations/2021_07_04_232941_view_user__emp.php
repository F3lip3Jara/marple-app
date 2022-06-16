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

           /*CREATE OR REPLACE VIEW usuarios( token, name, email, imgName, idRol, rolDes, emploNom, emploApe, emploFecNac, gerId, gerDes , activado, reinicio ,created_at , id) AS( SELECT a.token, a.name, a.email, c.emploAvatar, a.idRol, b.RolDes, c.emploNom, c.emploApe, c.emploFecNac, c.gerId, d.gerDes , a.activado , a.reinicio ,a.created_at , a.id FROM users a JOIN roles b ON a.idRol = b.idRol LEFT JOIN empleados c ON a.id = c.id LEFT JOIN gerencia d ON c.gerId = d.gerId);
           CREATE OR REPLACE VIEW tblusuarios( id, name, email, rolDes, emploNom, emploApe, emploFecNac, gerDes, activado, reinicio, created_at ) AS( SELECT a.id, a.name, a.email, b.RolDes, c.emploNom, c.emploApe, c.emploFecNac, d.gerDes, CASE WHEN a.activado = 'A' THEN "ACTIVADO" WHEN a.activado = 'D' THEN "DESACTIVADO" END AS 'activado', CASE WHEN a.reinicio = 'S' THEN "SI" WHEN a.reinicio = 'N' THEN "NO" END 'reinicio', a.created_at FROM users a JOIN roles b ON a.idRol = b.idRol LEFT JOIN empleados c ON a.id = c.id LEFT JOIN gerencia d ON c.gerId = d.gerId ORDER BY a.created_at DESC );
           CREATE OR REPLACE VIEW regiones (idReg, regDes, regCod, empId, idPai, created_at, updated_at , paiDes , paiCod) as ( SELECT a.idReg, a.regDes, a.regCod, a.empId, a.idPai, a.created_at, a.updated_at , paiDes , paiCod from region a join pais b on a.idPai = b.idPai );
           CREATE OR REPLACE VIEW comunas (idCom, comDes, comCod, empId, idPai, idReg,idCiu , ciuDes , created_at, updated_at , paiCod , paiDes , regCod , regDes) AS (SELECT idCom, comDes, comCod, a.empId, a.idPai, a.idReg,  a.idCiu , ciuDes , a.created_at, a.updated_at , paicod , paiDes , regCod , regDes  from comuna a JOIN region b on a.idReg = b.idReg join pais c on a.idPai = c.idPai join ciudad d on a.idCiu = d.idCiu);
           CREATE OR REPLACE VIEW ciudades ( empId, idPai, idReg, created_at, updated_at , paiCod , paiDes , regCod , regDes , idCiu , ciuDes , ciuCod) AS (SELECT a.empId, a.idPai, a.idReg, a.created_at, a.updated_at , paicod , paiDes , regCod , regDes , a.idCiu , ciuDes , ciuCod from ciudad a JOIN region b on a.idReg = b.idReg JOIN pais c on a.idPai = c.idPai ) ;
           CREATE OR REPLACE VIEW proveedores( id , rut , nombre,nombre_fantasia,giro,pais,region,comuna,ciudad,direccion,numero,telefono ,es_cliente, es_proveedor,mail , activado)AS ( SELECT idPrv ,prvRut, prvNom, prvNom2, prvGiro,b.paiDes , c.regDes,d.comDes,e.ciuDes, prvDir, prvNum , prvTel, prvCli, prvPrv, prvMail , prvAct from proveedor a join pais b on a.idPai = b.idPai join region c on a.idReg = c.idReg join comuna d on a.idCom = d.idCom join ciudad e on a.idCiu = e.idCiu );
           CREATE OR REPLACE VIEW proveedores_dir( id,rut ,pais,region,comuna,ciudad,direccion,numero)AS ( SELECT a.idPrvd , f.prvRut,b.paiDes , c.regDes,d.comDes,e.ciuDes, prvdDir, prvdNum From prv_dir_des a join pais b on a.idPai = b.idPai join region c on a.idReg = c.idReg join comuna d on a.idCom = d.idCom join ciudad e on a.idCiu = e.idCiu join proveedor f on a.idPrv = f.idPrv);
           CREATE OR REPLACE VIEW productos( id, cod_pareo, descripcion, observaciones, cod_rapido, cod_barra, tipo,grupo , sub_grupo , color , moneda ,costo, neto, bruto, medida , peso, minimo, inventariable, created_at, updated_at) As ( SELECT a.idPrd, prdCod, prdDes, prdObs, prdRap, prdEan, prdTip,c.grpDes , d.grpsDes , e.colDes , b.monCod , prdCost, prdNet, prdBrut, f.unDes , prdPes, prdMin,prdInv , a.created_at, a.updated_at from producto a join moneda b on a.idMon = b.idMon join grupo c on a.idGrp = c.idGrp join sub_grupo d on a.idSubGrp = d.idSubGrp join color e on a.idCol = e.idCol join un_medida f on a.idUn = f.idUn);
           CREATE OR REPLACE VIEW orden_produccion   AS  (select a.idOrp AS id,a.orpUsrG AS usuario,a.orpNumOc AS orden_compra,a.orpNumRea AS orden_produccion,b.prvRut AS rut_cliente,a.orpFech AS fecha,case when a.orpEst = 1 then 'PENDIENTE' when a.orpEst = '1' then 'PROCESANDO' end AS estado_ord,case when a.orpEstPrc = 1 then 'PENDIENTE' when a.orpEstPrc = '1' then 'PARCIAL' end AS estado_pro,a.orpObs AS observaciones,a.created_at AS created_at,a.updated_at AS updated_at from (ord_produccion a join proveedor b on(a.idPrv = b.idPrv)));
           CREATE OR REPLACE VIEW ordenes_de_trabajos  AS  (select a.idOrdt AS id,b.orpNumRea AS orden_produccion,b.orpFech AS orden_prod_fec,a.orptUsrG AS usuario_genera,case when a.orptEst = 1 then 'PENDIENTE' when a.orptEst = 2 then 'EN PROCESO' end AS estado,a.orptPrio AS prioridad,a.created_at AS created_at,a.updated_at AS updated_at from (ord_trabajo a join ord_produccion b on(a.idOrp = b.idOrp))) ;
           CREATE OR REPLACE VIEW ordenes_de_trabajos_det AS( SELECT a.idOrdt AS id, b.idorp AS orden_produccion, c.ordtdPrdCod FROM ( ord_trabajo a JOIN ord_produccion b ON a.idOrp = b.idOrp JOIN ord_trabajo_det c ON a.idOrdt = c.idOrdt ) ) ;
           CREATE OR REPLACE VIEW mezclas AS( SELECT a.idMez AS id, a.mezUsu AS usuario, a.mezLotSal AS lote_salida, a.mezKil AS kilos, a.mezMaq AS maquina, b.etaDes AS etapa, a.mezprdCod AS producto, CASE WHEN a.mezTip = 'S' THEN 'SACA' WHEN a.mezTip = 'B' THEN 'BINS' END AS tipo, CASE WHEN a.mezEst = 'P' THEN 'PENDIENTE' WHEN a.mezEst = 'A' THEN 'APROBADA' END AS estado_pro, CASE WHEN a.mezEstCtl = 'P' THEN 'PENDIENTE' WHEN a.mezEstCtl = 'A' THEN 'APROBADA' WHEN a.mezEstCtl = 'R' THEN 'RECHAZADA' END AS estado_control, CASE WHEN a.mezTurn = 1 THEN 'TURNO 1' WHEN a.mezTurn = 2 THEN 'TURNO2' END AS turno, a.mezObs as observaciones, a.created_at AS created_at, a.updated_at AS updated_at FROM mezcla a JOIN etapasUser b ON (a.mezidEta = b.idEta) );
           CREATE OR REPLACE VIEW extrusiones AS( SELECT a.idExt AS id, a.extUsu AS usuario, a.extLotSal AS lote_bobina, a.extAnbob AS ancho_bobina, a.extMaq AS maquina, a.extKilApr AS kilos, a.extKilR AS kilos_repro, b.etaDes AS etapa, a.extPrdCod AS producto, c.mezLotSal AS lote_mezcla, a.extFor AS formato, d.motDes AS mot_rechazo, CASE WHEN a.extEst = 'P' THEN 'PENDIENTE' WHEN a.extEst = 'A' THEN 'APROBADA' END AS estado_pro, CASE WHEN a.extEstCtl = 'P' THEN 'PENDIENTE' WHEN a.extEstCtl = 'A' THEN 'APROBADA' WHEN a.extEstCtl = 'R' THEN 'RECHAZADA' END AS estado_control, CASE WHEN a.extTurn = 1 THEN 'TURNO 1' WHEN a.extTurn = 2 THEN 'TURNO2' END AS turno, a.extObs AS observaciones, a.created_at AS created_at, a.updated_at AS updated_at FROM  extrusion a LEFT JOIN etapasUser b ON a.extidEta = b.idEta LEFT JOIN mezcla c ON  a.extIdMez = c.idMez LEFT JOIN mot_rechazo d ON  a.extIdMot = d.idMot);
           CREATE OR REPLACE VIEW ordenes_de_termoformado AS( SELECT a.idOrdt AS id, b.orpNumRea AS orden_produccion, b.orpFech AS orden_prod_fec, a.orptUsrG AS usuario_genera, c.etaDes AS destino, d.ordtdPrdCod AS producto, d.ortdSol AS cantidad_sol, CASE WHEN a.orptEst = 1 THEN 'PENDIENTE' WHEN a.orptEst = 2 THEN 'EN PROCESO' END AS estado, a.orptPrio AS prioridad, a.created_at AS created_at, a.updated_at AS updated_at FROM ( ord_trabajo a JOIN ord_produccion b ON (a.idOrp = b.idOrp) JOIN etapasUser c ON (b.idEta = c.idEta) JOIN ord_trabajo_det d ON ( a.empId = d.empId AND a.idOrdt = d.idOrdt ) ) WHERE c.idEta = 5 );*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
