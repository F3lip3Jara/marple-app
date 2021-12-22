<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrdForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producto', function (Blueprint $table) {
            $table->bigInteger('idMon')->unsigned();
            $table->foreign('idMon')->references('idMon')->on('moneda');
            $table->bigInteger('idGrp')->unsigned();
            $table->foreign('idGrp')->references('idGrp')->on('grupo');
            $table->bigInteger('idSubGrp')->unsigned();
            $table->foreign('idSubGrp')->references('idSubGrp')->on('sub_grupo');
            $table->bigInteger('idCol')->unsigned();
            $table->foreign('idCol')->references('idCol')->on('color');
            $table->bigInteger('idUn')->unsigned();
            $table->foreign('idUn')->references('idUn')->on('un_medida');
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
