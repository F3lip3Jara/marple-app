<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogSys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_sys', function (Blueprint $table) {
            $table->bigIncrements('idLog');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idEta')->unsigned();
            $table->foreign('idEta')->references('idEta')->on('etapasUser');
            $table->bigInteger('idEtaDes')->unsigned();
            $table->foreign('idEtaDes')->references('idEtaDes')->on('etapasUserDes');
            $table->string('lgDes');
            $table->string('lgId');
            $table->string('lgName');
            $table->integer('lgTip');
            $table->string('lgDes1')->nullable();
            $table->string('lgDes2')->nullable();
            $table->string('lgDes3')->nullable();
            $table->string('lgDes4')->nullable();
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
