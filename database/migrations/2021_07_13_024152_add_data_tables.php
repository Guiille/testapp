<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('rols')->insert([
            "id" => 1,
            "nombre" => 'Admin',
        ]);
        DB::table('rols')->insert([
            "id" => 2,
            "nombre" => 'Invitado',
        ]);
        // -------------------
        DB::table('permisos')->insert([
            "id" => 1,
            "permiso" => 'eliminar',
        ]);
        DB::table('permisos')->insert([
            "id" => 2,
            "permiso" => 'consultar',
        ]);

        // -------------------
        DB::table('roles_permisos')->insert([
            "id" => 1,
            "rol_id" => 1,
            "permiso_id" => 1,
        ]);
        DB::table('roles_permisos')->insert([
            "id" => 2,
            "permiso_id" => 2,
            "rol_id" => 2,
        ]);
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
