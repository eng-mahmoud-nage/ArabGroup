<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookListsTable extends Migration {

	public function up()
	{
		Schema::create('book_lists', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->string('source')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('book_lists');
	}
}