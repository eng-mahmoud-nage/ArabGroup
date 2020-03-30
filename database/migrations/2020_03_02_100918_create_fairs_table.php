<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFairsTable extends Migration {

	public function up()
	{
		Schema::create('fairs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('location');
			$table->string('date');
			$table->string('pdf')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('fairs');
	}
}