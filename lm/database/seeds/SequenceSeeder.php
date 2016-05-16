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

    	$sequenceable = App\Sequenceable::find(2);
    	$sequenceable2 = App\Sequenceable::find(6);
    	$sequenceable3 = App\Sequenceable::find(8);
    	$sequenceable4 = App\Sequenceable::find(1);

    	$seq->replaceOrderedSequenceables(collect([
    		$sequenceable, 
    		$sequenceable2, 
    		$sequenceable3,
    		$sequenceable4
    	]));

    	$seq2 = App\Sequence::create([
    		'name' => 'sequence2',
    		'user_id' => 1
    	]);

    	$sequenceable21 = App\Sequenceable::find(5);
    	$sequenceable22 = App\Sequenceable::find(3);

    	$seq2->replaceOrderedSequenceables(collect([
    		$sequenceable22,
    		$seq->sequenceable,
    		$sequenceable21
    	]));




    }
}
