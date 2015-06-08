<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameLargeImgToFilename extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images_tbl', function(Blueprint $table)
		{
			$table->renameColumn('large_img', 'filename');
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
