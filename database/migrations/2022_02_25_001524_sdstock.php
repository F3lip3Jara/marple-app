<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sdstock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sd_stock', function (Blueprint $table) {
            $table->bigIncrements('idExi');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idCentro')->unsigned();
            $table->bigInteger('idSector')->unsigned();
            $table->bigInteger('idPrd')->unsigned();
            $table->foreign('idPrd')->references('idPrd')->on('producto');
            $table->string('exiDis');
            $table->integer('exiTrans');
            $table->string('exiReser');
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
