<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\Question::class, 220)->create()->each(function($q) {
        	// Nothingness
    	});
    }
}
