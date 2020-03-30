<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailListsTable extends Migration {

	public function up()
	{
		Schema::create('mail_lists', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
		});
	}

	public function down()
	{
		Schema::drop('mail_lists');
	}
}