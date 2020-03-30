<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentsTable extends Migration {

	public function up()
	{
		Schema::create('agents', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('country');
			$table->string('title');
			$table->string('website')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('agents');
	}
}