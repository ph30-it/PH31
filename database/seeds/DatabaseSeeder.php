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
        // $this->call(UsersTableSeeder::class);
        $this->call(BreedTableSeeder::class);
        $this->call(CatTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
