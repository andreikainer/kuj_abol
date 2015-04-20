<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('posts_tbl', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('post_title', 35);
            $table->text('post_content');
            $table->string('author_name');
            $table->string('slug');
            $table->boolean('hidden');
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
		Schema::drop('posts_tbl');
	}

}
