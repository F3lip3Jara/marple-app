<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mezcla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mezcla', function (Blueprint $table) {
            $table->bigIncrements('idMez');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->string('mezUsu');
            $table->string('mezLotSal');
            $table->decimal('mezKil', 10, 2);
            $table->char('mezTip');
            $table->string('mezEst');
            $table->string('mezEstCtl');
            $table->string('mezMaq');
            $table->string('mezidEta');
            $table->string('mezprdCod');
            $table->string('mezidPrd');
            $table->string('mezprdDes');
            $table->integer('mezTurn');
            $table->longText('mezObs');
            $table->timestamps();
        });

        Schema::create('mezcla_det', function (Blueprint $table) {
            $table->bigIncrements('idMezd');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idMez')->unsigned();
            $table->foreign('idMez')->references('idMez')->on('mezcla');
            $table->bigInteger('mezdidPrd');
            $table->string('mezdprdCod');
            $table->string('mezdprdTip');
            $table->string('mezdprdDes');
            $table->string('mezdLotIng');
            $table->string('mezdUso');
            $table->string('mezdManual')->nullable();
            $table->decimal('mezdKil' , 10 , 2);
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
