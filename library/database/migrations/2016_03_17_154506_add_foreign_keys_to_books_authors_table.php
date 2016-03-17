<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBooksAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('books_authors', function(Blueprint $table)
		{
			$table->foreign('book_id', 'fk_authors_books')->references('id')->on('books')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('author_id', 'fk_books_authors')->references('id')->on('authors')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('books_authors', function(Blueprint $table)
		{
			$table->dropForeign('fk_authors_books');
			$table->dropForeign('fk_books_authors');
		});
	}

}
