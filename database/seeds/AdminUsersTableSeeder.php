<?php

use DarkShare\Users\AdminUser;
use DarkShare\Users\User;
use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    public function run()
    {
        $user = User::where('username', 'jstoone')->first();

        AdminUser::create([
            'user_id' => $user->id,
        ]);
    }

}
