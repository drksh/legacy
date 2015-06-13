<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Tables that needs cleaning
     * 
     * @var array
     */
    protected $tables = [
        'users', 'admin_users',
        'snippets', 'files', 'urls',
        'snippet_slugs', 'file_slugs', 'url_slugs',
    ];

    /**
     * Seeders
     *
     * @var array
     */
    protected $seeders = [
        'UsersTableSeeder',
        'AdminUsersTableSeeder',
		'SnippetsTableSeeder',
		'FilesTableSeeder',
		'UrlsTableSeeder',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->cleanDatabase();

        foreach($this->seeders as $seedClass)
        {
            $this->call($seedClass);
        }
    }

    /**
     * Clean the database for previous data
     */
    protected function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
