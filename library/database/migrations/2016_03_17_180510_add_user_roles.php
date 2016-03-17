<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\Models\Role;

class AddUserRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roles = [
            'Administrator',
            'Editor',
            'Basic',
            'Guest'
        ];

        foreach($roles as $role){
            $newRole = new Role;
            $newRole->name = $role;
            $newRole->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $roles = [
            'Administrator',
            'Editor',
            'Basic',
            'Guest'
        ];

        foreach($roles as $role){
            $findRole = Role::where('name', $role)->first();

            $findRole->delete();
        }
    }
}
