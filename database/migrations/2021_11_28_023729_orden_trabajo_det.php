<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdenTrabajoDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_trabajo_det', function (Blueprint $table) {
            $table->bigIncrements('idOrdtd');
            $table->bigInteger('idOrdt')->unsigned();
            $table->foreign('idOrdt')->references('idOrdt')->on('ord_trabajo');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->string('ordtdPrdCod');
            $table->string('ordtdPrdDes');
            $table->integer('ortdSol');
            $table->integer('ortdProd');
            $table->string('orpdObs')->nullable();
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
