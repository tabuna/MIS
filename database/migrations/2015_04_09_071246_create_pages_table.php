<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->text('content');
            $table->string('tag')->nullable();
            $table->string('descript')->nullable();
            $table->integer('ids');
            $table->timestamps();
            $table->softDeletes();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}