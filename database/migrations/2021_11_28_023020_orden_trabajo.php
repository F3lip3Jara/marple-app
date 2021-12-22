<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdenTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ord_trabajo', function (Blueprint $table) {
            $table->bigIncrements('idOrdt');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idOrp')->unsigned();
            $table->foreign('idOrp')->references('idOrp')->on('ord_produccion');
            $table->string('orptFech')->nullable();
            $table->string('orptUsrG');
            $table->string('orptTurns')->nullable();
            $table->integer('orptEst');
            $table->char('orptPrio');
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
