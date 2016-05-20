<?php

use Illuminate\Database\Seeder;
use App\Sequenceable;
use App\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\Question::class, 220)->create()->each(function($question) {
        	// For seeding we have to create sequenceable separately
            // In codebase use Question::create()

            Sequenceable::create([
                'user_id' => $question->item->user_id,
                'sequenceable_id' => $question->id,
                'sequenceable_type' => Question::class
            ]);  
    	});
    }
}
