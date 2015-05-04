<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignKeysOnImagesTbl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images_tbl', function(Blueprint $table)
		{
			$table->dropForeign('images_tbl_project_id_foreign');
            $table->dropForeign('images_tbl_post_id_foreign');
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
