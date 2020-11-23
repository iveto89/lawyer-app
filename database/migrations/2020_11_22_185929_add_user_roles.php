<?php

use Illuminate\Database\Migrations\Migration;

class AddUserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert([
            [
               'guard_name' => 'web',
               'name' => 'lawyer',
            ],
            [
                'guard_name' => 'web',
                'name' => 'citizen',
            ],
        ]);

        DB::table('permissions')->insert([
            [
                'guard_name' => 'web',
                'name' => 'lawyer',
            ],
            [
                'guard_name' => 'web',
                'name' => 'citizen',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $roles = ['lawyer', 'citizen'];

        DB::table('roles')->whereIn('name', $roles)->delete();

        DB::table('permissions')->whereIn('name', $roles)->delete();
    }
}
