<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('images_tbl', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('large_img');
            $table->string('small_img');
            $table->boolean('main_img')->default(0);
            $table->integer('project_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('projects_tbl');

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
		Schema::drop('images_tbl');
	}

}
