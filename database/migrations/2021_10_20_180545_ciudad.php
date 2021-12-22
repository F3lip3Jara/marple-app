<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ciudad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudad', function (Blueprint $table) {
            $table->bigIncrements('idCiu');
            $table->string('ciuDes');
            $table->string('ciuCod');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idPai')->unsigned();
            $table->foreign('idPai')->references('idPai')->on('pais');
            $table->bigInteger('idReg')->unsigned();
            $table->foreign('idReg')->references('idReg')->on('region');
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
