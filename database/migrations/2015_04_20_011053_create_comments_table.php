<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('comments_tbl', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->text('comment');
            $table->boolean('hidden');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users_tbl');

            $table->foreign('post_id')
                ->references('id')
                ->on('posts_tbl');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments_tbl');
	}

}
