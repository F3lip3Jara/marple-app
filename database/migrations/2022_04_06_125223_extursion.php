<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Extursion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extrusion', function (Blueprint $table) {
            $table->bigIncrements('idExt');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->string('extUsu');
            $table->string('extLotSal');
            $table->decimal('extAnbob', 10, 2)->nullable();
            $table->string('extEst');
            $table->string('extEstCtl');
            $table->string('extMaq');
            $table->string('extFor')->nullable();
            $table->string('extidEta')->nullable();
            $table->string('extPrdCod')->nullable();
            $table->string('extIdPrd')->nullable();
            $table->string('extPrdDes')->nullable();
            $table->integer('extTurn');
            $table->integer('extIdMez');
            $table->integer('extIdMot')->nullable();
            $table->string('extMotDes')->nullable();
            $table->longText('extObs')->nullable();
            $table->decimal('extKilApr', 10, 2)->nullable();;
            $table->decimal('extKilR', 10, 2)->nullable();;

            $table->timestamps();
        });

        Schema::create('extrusion_det', function (Blueprint $table) {
            $table->bigIncrements('idExtd');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idExt')->unsigned();
            $table->foreign('idExt')->references('idExt')->on('extrusion');
            $table->decimal('extdIzq' , 10 , 2);
            $table->decimal('extdCen' , 10 , 2);
            $table->decimal('extdDer' , 10 , 2);
            $table->string('extdEst');
            $table->string('extdHorIni');
            $table->string('extdHorFin');
            $table->string('extdUso');
            $table->string('extdRol');
            $table->string('extdTip');
            $table->longText('extdObs')->nullable();;
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
