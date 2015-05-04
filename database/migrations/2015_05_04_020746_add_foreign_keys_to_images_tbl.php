<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToImagesTbl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images_tbl', function(Blueprint $table)
		{
            $table->integer('project_id')->unsigned()->nullable();
            $table->integer('post_id')->unsigned()->nullable();
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
		Schema::table('images_tbl', function(Blueprint $table)
		{
			//
		});
	}

}
