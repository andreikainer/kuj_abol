<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('documents_tbl', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('filename');
            $table->integer('project_id')->unsigned();
            $table->timestamps();

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
		Schema::drop('documents_tbl');
	}

}
