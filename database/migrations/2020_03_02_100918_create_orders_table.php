<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->double('order_price');
			$table->double('delivery_charge');
			$table->double('total_price');
			$table->double('total_weight');
			$table->integer('user_id')->unsigned()->nullable();
			$table->date('date');
			$table->string('address');
			$table->enum('status', array('inpreparation', 'delivered'));
			$table->boolean('payment')->default(0);
			$table->integer('city_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}