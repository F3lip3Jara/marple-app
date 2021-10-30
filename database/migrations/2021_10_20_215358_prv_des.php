<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrvDes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prv_dir_des', function (Blueprint $table) {
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idPrv')->unsigned();
            $table->foreign('idPrv')->references('idPrv')->on('proveedor');
            $table->bigIncrements('idPrvd');
            $table->string('prvdDir');
            $table->string('prvdNum');
            $table->bigInteger('idPai')->unsigned();
            $table->foreign('idPai')->references('idPai')->on('pais');
            $table->bigInteger('idReg')->unsigned();
            $table->foreign('idReg')->references('idReg')->on('region');
            $table->bigInteger('idCom')->unsigned();
            $table->foreign('idCom')->references('idCom')->on('comuna');
            $table->bigInteger('idCiu')->unsigned();
            $table->foreign('idCiu')->references('idCiu')->on('ciudad');
            $table->timestamps();
        });
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
