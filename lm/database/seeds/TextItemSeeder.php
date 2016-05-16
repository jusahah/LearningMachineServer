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
    		'note' => 'All the best things in life are not free. They are fucking expensive'
    	]);
    }
}
