<?php

use DarkShare\Submissions\Snippets\Snippet;
use DarkShare\Submissions\Snippets\SnippetSlug;
use Illuminate\Database\Seeder;

class SnippetsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		$users = \DarkShare\Users\User::lists('id');

		foreach (range(1, 100) as $index) {
			$snippet = Snippet::create([
				'user_id' => ($faker->boolean()) ? $faker->randomElement($users) : null,
				'title' => $faker->sentence(),
				'body' => $faker->paragraph(),
				'mode' => 'markdown',
				'password' => ($faker->boolean()) ? 'secret' : null,
			]);

			SnippetSlug::create([
				'snippet_id' => $snippet->id,
				'slug' => $snippet,
			]);
		}
	}

}
