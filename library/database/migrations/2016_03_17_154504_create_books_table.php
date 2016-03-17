<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_role_id')->nullable()->unique('user_role_id_UNIQUE');
			$table->string('title', 45);
			$table->dateTime('publication_date')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('thumb')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('books');
	}

}
