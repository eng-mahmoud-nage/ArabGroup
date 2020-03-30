<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistsTable extends Migration {

	public function up()
	{
		Schema::create('dists', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('address');
			$table->string('phone');
		});
	}

	public function down()
	{
		Schema::drop('dists');
	}
}