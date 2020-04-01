<?php

use Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\DB;

class InsertDefaultUsersGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('user_groups')->insert(
            [
                'id' => 1,
                'name' => 'Administradores',
                'can_view_phones' => true,
                'can_edit_phones' => true,
                'can_delete_phones' => true,
                'can_view_activities' => true
            ]
        );

        DB::table('user_groups')->insert(
            [
                'id' => 2,
                'name' => 'Usuários',
                'can_view_phones' => true,
                'can_edit_phones' => false,
                'can_delete_phones' => false,
                'can_view_activities' => false
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
        DB::table('user_groups')->delete([1]);
        DB::table('user_groups')->delete([2]);
    }
}
