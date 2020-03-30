<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	public function up()
	{
		Schema::create('books', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('author');
			$table->string('isbn');
			$table->text('details');
			$table->date('publish_date');
			$table->string('cover_img')->nullable();
			$table->string('back_img')->nullable();
			$table->string('pdf')->nullable();
			$table->double('price');
			$table->float('weight');
			$table->integer('views');
			$table->boolean('favourite')->default(0);
			$table->integer('category_id')->unsigned();
			$table->string('permalink_title');
			$table->text('permalink_description');
			$table->string('permalink_keyword');
		});
	}

	public function down()
	{
		Schema::drop('books');
	}
}