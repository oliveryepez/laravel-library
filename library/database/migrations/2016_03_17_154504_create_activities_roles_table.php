<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitiesRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities_roles', function(Blueprint $table)
		{
			$table->integer('id')->unique('id_UNIQUE');
			$table->integer('role_id')->unique('role_id_UNIQUE');
			$table->integer('activity_id')->unique('activity_id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activities_roles');
	}

}
