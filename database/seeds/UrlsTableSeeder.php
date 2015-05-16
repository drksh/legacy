<?php

use DarkShare\Submissions\Urls\Url;
use DarkShare\Submissions\Urls\UrlSlug;
use DarkShare\Users\User;
use Illuminate\Database\Seeder;

class UrlsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		$users = User::lists('id');

		foreach (range(1, 500) as $index) {
			$url = Url::create([
				'user_id' => ($faker->boolean()) ? $faker->randomElement($users) : null,
				'destination' => $faker->url,
				'password' => ($faker->boolean()) ? 'secret' : null,
			]);

			UrlSlug::create([
				'url_id' => $url->id,
				'slug' => $url,
			]);
		}
	}

}
