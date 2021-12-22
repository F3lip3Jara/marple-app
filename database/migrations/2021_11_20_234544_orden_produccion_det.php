<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdenProduccionDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_produccion_det', function (Blueprint $table) {
            $table->bigIncrements('idOrpd');
            $table->bigInteger('idOrp')->unsigned();
            $table->foreign('idOrp')->references('idOrp')->on('ord_produccion');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->string('orpdPrdCod');
            $table->string('orpdPrdDes');
            $table->integer('orpdCant');
            $table->integer('orpdCantDis');
            $table->integer('orpdTotP');
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
