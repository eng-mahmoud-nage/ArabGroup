<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookOrderTable extends Migration {

	public function up()
	{
		Schema::create('book_order', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('book_id')->unsigned();
			$table->integer('order_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable();
			$table->double('price');
			$table->double('weight');
			$table->integer('quantity');
			$table->string('session_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('book_order');
	}
}