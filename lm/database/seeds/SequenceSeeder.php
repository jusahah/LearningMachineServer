<?php

use Illuminate\Database\Seeder;

class SequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$seq = App\Sequence::create([
    		'name' => 'sequence1',
    		'user_id' => 1
    	]);

    	$sequenceable = App\Sequenceable::find(4);

    	$seq->sequenceables()->save($sequenceable);
    }
}
