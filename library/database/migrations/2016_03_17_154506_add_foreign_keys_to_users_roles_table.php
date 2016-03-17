<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_roles', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_users_users_roles')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role_id', 'roles_by_users')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_roles', function(Blueprint $table)
		{
			$table->dropForeign('fk_users_users_roles');
			$table->dropForeign('roles_by_users');
		});
	}

}
