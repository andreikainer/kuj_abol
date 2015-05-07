<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignKeyColumnsOnImagesTbl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images_tbl', function(Blueprint $table)
		{
			$table->dropColumn('project_id');
            $table->dropColumn('post_id');
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
