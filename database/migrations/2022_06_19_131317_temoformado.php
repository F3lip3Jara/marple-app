<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Temoformado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('termoformado', function (Blueprint $table) {
            $table->bigIncrements('idTer');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->string('terUso');
            $table->string('tertLotSal');           
            $table->string('terEst');
            $table->string('terEstCtl');
            $table->string('terMaq');            
            $table->integer('terTurn');
            $table->longText('terObs')->nullable();            
            $table->timestamps();
        });

        Schema::create('termoformado_det', function (Blueprint $table) {
            $table->bigIncrements('idTerd');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idTer')->unsigned();
            $table->foreign('idTer')->references('idTer')->on('termoformado');           
            $table->string('terdEst');
            $table->string('terdHorIni');
            $table->string('terdHorFin')->nullable();
            $table->string('terdUso');
            $table->string('terdRol');            
            $table->longText('terdObs')->nullable();
            $table->timestamps();
        });
    }
}
