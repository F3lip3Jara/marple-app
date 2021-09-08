<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViewUserEmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $query = 'create or replace view Usuarios (token , name , email , imgName , idRol , rolDes , empNom , empApe, empFecNac)as ( select  a.token , a.name , a.email , a.imgName , a.idRol , b.RolDes , c.empNom , c.empApe , c.empFecNac from users a join roles b on a.idRol = b.idRol left join empleados c on a.id = c.id ) ';


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
