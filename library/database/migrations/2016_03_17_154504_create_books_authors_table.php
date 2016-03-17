<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books_authors', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('book_id')->nullable()->unique('book_id_UNIQUE');
			$table->integer('author_id')->nullable()->unique('author_id_UNIQUE');
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
		Schema::drop('books_authors');
	}

}
