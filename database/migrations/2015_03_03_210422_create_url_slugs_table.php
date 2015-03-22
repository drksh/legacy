<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlSlugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('url_slugs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('url_id')->unsigned();
			$table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
			$table->string('slug');
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
		Schema::drop('url_slugs');
	}

}
