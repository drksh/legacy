<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnippetSlugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('snippet_slugs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('snippet_id')->unsigned();
			$table->foreign('snippet_id')->references('id')->on('snippets')->onDelete('cascade');
			$table->string('slug')->unique();
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
		Schema::drop('snippet_slugs');
	}

}
