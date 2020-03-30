<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
	$table->string('name')->nullable();
	$table->string('address')->nullable();
	$table->string('phone')->nullable();
	$table->string('email')->nullable();
	$table->string('user_name')->unique();
	$table->string('password');
	$table->integer('city_id')->unsigned()->nullable();
	$table->boolean('active')->default(1);
	$table->boolean('admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
