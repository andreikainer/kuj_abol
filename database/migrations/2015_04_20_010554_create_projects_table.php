<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('projects_tbl', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('project_name')->unique();
            $table->string('short_desc', 180);
            $table->text('full_desc');
            $table->float('target_amount');
            $table->string('child_name', 20);
            $table->integer('user_id')->unsigned();
            $table->boolean('approved')->default(0);
            $table->boolean('succ_funded')->default(0);
            $table->boolean('application_status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users_tbl');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects_tbl');
	}

}
