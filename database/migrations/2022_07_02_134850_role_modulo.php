<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoleModulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       /* Schema::create('roles_menu', function (Blueprint $table) {
            $table->bigIncrements('idMen');
            $table->bigInteger('idRol')->unsigned();
            $table->foreign('idRol')->references('idRol')->on('roles');
            $table->string('menDes');
            $table->timestamps();
        });
        */
        Schema::create('roles_module', function (Blueprint $table) {
            $table->bigIncrements('idMol');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->string('molDes');
            $table->string('molIcon');
            $table->timestamps();
        });

        Schema::create('roles_opt', function (Blueprint $table) {
            $table->bigIncrements('idOpt');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->string('optDes');
            $table->string('optLink');
            $table->char('optSub');
            $table->timestamps();
        });

        Schema::create('roles_opt_sub', function (Blueprint $table) {
            $table->bigIncrements('idOptSub');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idOpt')->unsigned();
            $table->foreign('idOpt')->references('idOpt')->on('roles_opt');
            $table->string('optSDes');
            $table->string('optSLink');          
            $table->timestamps();
        });


        Schema::create('rol_mod', function (Blueprint $table) {
            $table->bigIncrements('idRolMod');
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idRol')->unsigned();
            $table->foreign('idRol')->references('idRol')->on('roles');
            $table->bigInteger('idMol')->unsigned();
            $table->foreign('idMol')->references('idMol')->on('roles_module');         
            $table->timestamps();
        });

        Schema::create('roles_mod_opt', function (Blueprint $table) {           
            $table->bigInteger('empId')->unsigned();
            $table->foreign('empId')->references('empId')->on('empresa');
            $table->bigInteger('idRol')->unsigned();
            $table->foreign('idRol')->references('idRol')->on('roles');
            $table->bigInteger('idMol')->unsigned();
            $table->foreign('idMol')->references('idMol')->on('roles_module');
            $table->bigInteger('idOpt')->unsigned();
            $table->foreign('idOpt')->references('idOpt')->on('roles_opt');           
            $table->timestamps();
        });

        Schema::create('roles_mod_opt_act', function (Blueprint $table) {
            $table->bigIncrements('idAct');
            $table->bigInteger('idRol')->unsigned();
            $table->foreign('idRol')->references('idRol')->on('roles');
            $table->bigInteger('idMol')->unsigned();
            $table->foreign('idMol')->references('idMol')->on('roles_module');
            $table->bigInteger('idOpt')->unsigned();
            $table->foreign('idOpt')->references('idOpt')->on('roles_mod_opt');
            $table->char('actVig');          
            $table->timestamps();
        });

        Schema::create('roles_aut', function (Blueprint $table) {
            $table->bigIncrements('idAut');
            $table->bigInteger('idRol')->unsigned();
            $table->foreign('idRol')->references('idRol')->on('roles');
            $table->bigInteger('idMol')->unsigned();
            $table->foreign('idMol')->references('idMol')->on('roles_module');
            $table->bigInteger('idOpt')->unsigned();
            $table->foreign('idOpt')->references('idOpt')->on('roles_mod_opt');
            $table->char('autVig');          
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
