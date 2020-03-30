<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('books', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('regions', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('book_order', function(Blueprint $table) {
			$table->foreign('book_id')->references('id')->on('books')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		// Schema::table('book_order', function(Blueprint $table) {
		// 	$table->foreign('order_id')->references('id')->on('orders')
		// 				->onDelete('cascade')
		// 				->onUpdate('cascade');
		// });
		// Schema::table('images', function(Blueprint $table) {
		// 	$table->foreign('imageable')->references('id')->on('news')
		// 				->onDelete('cascade')
		// 				->onUpdate('cascade');
		// });
	}

	public function down()
	{
		Schema::table('books', function(Blueprint $table) {
			$table->dropForeign('books_category_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_city_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_country_id_foreign');
		});
		Schema::table('regions', function(Blueprint $table) {
			$table->dropForeign('regions_city_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_user_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_city_id_foreign');
		});
		Schema::table('book_order', function(Blueprint $table) {
			$table->dropForeign('book_order_book_id_foreign');
		});
		// Schema::table('book_order', function(Blueprint $table) {
		// 	$table->dropForeign('book_order_order_id_foreign');
		// });
		// Schema::table('images', function(Blueprint $table) {
		// 	$table->dropForeign('images_imageable_foreign');
		// });
	}
}