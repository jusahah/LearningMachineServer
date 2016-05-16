<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\User::create([
    		'name' => 'Jussi',
    		'email' => 'jussi@nollaversio.fi',
    		'password' => bcrypt('123456'),
    	]);

		factory(App\User::class, 3)->create()->each(function($u) {
        	// Nothingness
    	});
    }
}
