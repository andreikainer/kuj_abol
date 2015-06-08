<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sponsors_tbl', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->integer('project_id')->nullable();
            $table->boolean('top_sponsor')->default(0);
            $table->string('business_name');
            $table->string('logo');
            $table->string('url')->nullable();
			$table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users_tbl');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects_tbl');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sponsors_tbl');
	}

}
