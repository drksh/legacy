<?php

use DarkShare\Users\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();

        User::create([
          'username' => 'jstoone',
          'password' => 'secret',
        ]);

        foreach (range(1, 50) as $index) {
            User::create([
              'username' => $faker->userName,
              'password' => 'secret',
            ]);
        }

    }

}
