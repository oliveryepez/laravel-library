<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBooksCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('books_categories', function(Blueprint $table)
		{
			$table->foreign('book_id', 'book_by_categories')->references('id')->on('books')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('category_id', 'categories_by books')->references('id')->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('books_categories', function(Blueprint $table)
		{
			$table->dropForeign('book_by_categories');
			$table->dropForeign('categories_by books');
		});
	}

}
