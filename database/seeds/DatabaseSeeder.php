<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        Model::reguard();

        factory('SIGAL\User')->create([
                'name' => 'admin',
                'email' => 'admin@admin',
                'password' => Hash::make("admin"),
        ]);


    }
}
