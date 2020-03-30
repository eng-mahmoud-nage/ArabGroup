<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('welcome_msg')->nullable();
			$table->text('contact_msg')->nullable();
			$table->text('about');
			$table->string('phone');
			$table->string('mobile');
			$table->string('address');
			$table->string('email');
			$table->string('facebook')->nullable();
			$table->string('instagram')->nullable();
			$table->string('twitter')->nullable();
			$table->string('linkedin')->nullable();
			$table->string('youtube')->nullable();
			$table->string('whatsapp')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}