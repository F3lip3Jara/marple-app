<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrvForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('proveedor', function (Blueprint $table) {
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idPai')->unsigned();
            $table->foreign('idPai')->references('idPai')->on('pais');
            $table->bigInteger('idReg')->unsigned();
            $table->foreign('idReg')->references('idReg')->on('region');
            $table->bigInteger('idCom')->unsigned();
            $table->foreign('idCom')->references('idCom')->on('comuna');
            $table->bigInteger('idCiu')->unsigned();
            $table->foreign('idCiu')->references('idCiu')->on('ciudad');
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
