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

    	/*
    	$sequenceable = App\Sequenceable::find(1);
    	$sequenceable2 = App\Sequenceable::find(2);
    	$sequenceable3 = App\Sequenceable::find(1);
    	$sequenceable4 = App\Sequenceable::find(2);

    	$seq->replaceOrderedSequenceables(collect([
    		$sequenceable, 
    		$sequenceable2, 
    		$sequenceable3,
    		$sequenceable4
    	]));

    	echo "First run done";
		*/

    	$seq2 = App\Sequence::create([
    		'name' => 'sequence2',
    		'user_id' => 1
    	]);
    	$seq3 = App\Sequence::create([
    		'name' => 'sequence3',
    		'user_id' => 1
    	]);
    	$seq4 = App\Sequence::create([
    		'name' => 'sequence4',
    		'user_id' => 1
    	]);
    	$sequenceable21 = App\Sequenceable::find(1);
    	$sequenceable22 = App\Sequenceable::find(2);
    	$sequenceable23 = App\Sequenceable::find(7);
    	$sequenceable24 = App\Sequenceable::find(8);
    	$sequenceable25 = App\Sequenceable::find(9);
    	$sequenceable26 = App\Sequenceable::find(19);
    	$sequenceable27 = App\Sequenceable::find(20);


    	
    	/*
    	echo "\n-------\n-------\n-------\n-------\n-------\n-------\n";
    	$sequenceable4 = App\Sequenceable::find(2);
    	$seq->replaceOrderedSequenceables(collect([
    		$sequenceable4,
    		$sequenceable22,
    		$sequenceable21    		
    	]));
    	echo "\n-------\n-------\n-------\n-------\nNESTED\n-------\n";
    	$seq2->replaceOrderedSequenceables(collect([
    		$sequenceable4,
    		$seq->sequenceable,
    		$sequenceable4,
    		$seq2->sequenceable
    	]));  
    	*/

    	$seq->replaceOrderedSequenceables(collect([
    		$sequenceable21,
    		$sequenceable23,
    	]));	

    	$seq2->replaceOrderedSequenceables(collect([
            App\Sequenceable::find(17),            
    		$seq->sequenceable,
    		$seq->sequenceable,

    	]));
    
    	$seq3->replaceOrderedSequenceables(collect([
    		$sequenceable26,
    		$sequenceable25,
    		$sequenceable24
    	]));

    	$seq4->replaceOrderedSequenceables(collect([
    		$sequenceable27,
    		$sequenceable26,
    		App\Sequenceable::find(2)
    	]));



    }
}
