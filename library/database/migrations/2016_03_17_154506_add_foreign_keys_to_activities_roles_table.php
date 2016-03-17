<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToActivitiesRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('activities_roles', function(Blueprint $table)
		{
			$table->foreign('activity_id', 'activities_by_roles')->references('id')->on('activities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role_id', 'roles_by_activities')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('activities_roles', function(Blueprint $table)
		{
			$table->dropForeign('activities_by_roles');
			$table->dropForeign('roles_by_activities');
		});
	}

}
