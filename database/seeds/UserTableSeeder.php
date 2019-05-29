<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();
    	// User::create(
    	// 	[
    	// 		'name' => 'abc',
    	// 		'email' => 'test11@gmail.com',
    	// 		'password' => bcrypt('12345678')
    	// 	]
    	// );
    }
}
