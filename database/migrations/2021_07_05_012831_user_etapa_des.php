<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserEtapaDes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapasUserDes', function (Blueprint $table) {
            $table->bigInteger('idEta')->unsigned();
            $table->foreign('idEta')->references('idEta')->on('etapasUser');
            $table->bigIncrements('idEtaDes');
            $table->string('etaDesDes');
            $table->timestamp('etaFecIni')->nullable();
            $table->timestamp('etaFecFin')->nullable();
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
