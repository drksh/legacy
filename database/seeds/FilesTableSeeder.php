<?php

use DarkShare\Submissions\Files\File;
use DarkShare\Submissions\Files\FileSlug;
use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder {

	public function run() {

		$faker = Faker\Factory::create();

		$users = \DarkShare\Users\User::lists('id');
		$users[] = null;

		foreach(range(1, 500) as $index) {
			$file = File::create([
				'user_id'   => ($faker->boolean()) ? $faker->randomElement($users) : null,
				'title'     => $faker->sentence(),
				'path'      => '/home/vagrant/sites/darkshare/storage/app/testfile.md',
				'password'  => ($faker->boolean()) ? 'secret' : null,
			]);

			FileSlug::create([
				'file_id'   => $file->id,
				'slug'      => $file,
			]);
		}
	}

}
