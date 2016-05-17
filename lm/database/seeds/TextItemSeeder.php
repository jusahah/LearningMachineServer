<?php

use Illuminate\Database\Seeder;

class TextItemSeeder extends Seeder
{
    public function run() {   	
		App\TextItem::createItem([
    		'name' => 'Testiteksti',
    		'summary' => 'Note about cash',
    		'category_id' => 5,
    		'user_id' => 1,
    		'tags' => 'koira,hauva,harakka',

    		'note' => 'All the best things in life are not free. They are fucking expensive'
    	]);

		App\TextItem::createItem([
    		'name' => 'Testiteksti',
    		'summary' => 'Ok, we have DB tables and migrations, now let’s create models for them. The main part here is to assign a many-to-many relationship – it can be done from either of main tables models.',
    		'category_id' => 2,
    		'user_id' => 1,
    		'tags' => 'koira,PHP,varis,harakka',
    		'note' => 'Basically, ->pivot represents that intermediate pivot table, and with this we can access any of our described fields, like created_at, for example.'
    	]);

		App\TextItem::createItem([
    		'name' => 'Testiteksti',
    		'summary' => 'Want to hire our team of professional Laravel developers?',
    		'category_id' => 4,
    		'user_id' => 1,
    		'tags' => 'koira,PHP,varis',
    		'note' => 'And another REALLY useful function, in my experience, is updating the whole pivot table. Really often example – in your admin area there are checkboxes for shops for a particular product, and on Update operation you actually have to check all shops, delete those which are not in new checkbox array, and then add/update existing ones. Pain in the neck.'
    	]);    	

    }
}
