<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('empresa', function (Blueprint $table) {
            $table->bigIncrements('empId');
            $table->string('empDes');
            $table->string('empDir');
            $table->string('empGiro');
            $table->string('empRut');
            $table->string('empFono');
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
