<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory(App\Tag::class, 8)->create()->each(function($t) {
        	// Nothingness
    	});   

    	App\Tag::create([
    		'name' => 'Kakkosentag',
        	'user_id' => 2
        ]); 
    	App\Tag::create([
    		'name' => 'Kolmosentagi',
        	'user_id' => 3
        ]);              
    }
}
