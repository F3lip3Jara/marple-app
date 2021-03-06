<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->bigIncrements('idPrv');
            $table->string('prvRut');
            $table->string('prvNom');
            $table->string('prvNom2')->nullable();
            $table->string('prvGiro')->nullable();
            $table->string('prvNum')->nullable();
            $table->string('prvDir')->nullable();
            $table->string('prvTel')->nullable();
            $table->char('prvCli');
            $table->char('prvPrv');
            $table->string('prvMail')->nullable();
            $table->string('prvAct');
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

    }
}
