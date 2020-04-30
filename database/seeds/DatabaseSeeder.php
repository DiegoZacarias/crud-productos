<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
       		'name'=> 'admin',
       		'email' => 'admin@admin.com',
       		'password' => bcrypt('1234')

       ]);

        factory(App\User::class,5)->create();

        factory(App\Product::class,5)->create();
    }
}
