<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gerencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerencia', function (Blueprint $table) {
            $table->bigIncrements('gerId');
            $table->string('gerDes');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
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
