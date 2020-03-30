<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	public function up()
	{
		Schema::create('images', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('source');
			$table->string('imageable_type')->nullable();
			$table->integer('imageable_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('images');
	}
}