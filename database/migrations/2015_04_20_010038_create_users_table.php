<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users_tbl', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('user_name')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address')->nullable();
            $table->string('business_name')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('active')->default(0); // check dashboard access and admin banning
            $table->string('confirmation_code')->nullable();
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
		Schema::drop('users_tbl');
	}

}
