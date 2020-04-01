<?php

use Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

class InsertDefaultUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(
            [
                'id' => 1,
                'name' => 'Administrador',
                'email' => 'administrador@agenda.com.br',
                'password' => Hash::make('123456789'),
                'user_group_id' => 1
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->delete(1);
    }
}
