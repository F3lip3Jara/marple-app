<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdenProduccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_produccion', function (Blueprint $table) {
            $table->bigIncrements('idOrp');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idPrv')->unsigned();
            $table->foreign('idPrv')->references('idPrv')->on('proveedor');
            $table->string('orpNumOc');
            $table->string('orpNumRea');
            $table->string('orpFech');
            $table->string('orpUsrG');
            $table->string('orpObs')->nullable();
            $table->string('orpTurns')->nullable();
            $table->integer('orpEst');
            $table->integer('orpEstPrc');
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
