<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->bigIncrements('idPrd');
            $table->string('prdCod');
            $table->string('prdDes');
            $table->string('prdObs')->nullable();
            $table->string('prdRap');
            $table->string('prdEan');
            $table->string('prdTip');
            $table->double('prdCost');
            $table->double('prdNet');
            $table->double('prdBrut');
            $table->char('prdInv');
            $table->string('prdPes')->nullable();
            $table->string('prdMin');
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
        Schema::dropIfExists('productos');
    }
}
