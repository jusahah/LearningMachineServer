<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\Category::class, 4)->create()->each(function($c) {
        	// Nothingness
    	});

    	$subcategory = App\Category::create([
    		'name' => 'sub_cat_for_2',
    		'user_id' => 1,
    		'parent_id' => 2
    	]);

    	$subsubcategory = App\Category::create([
    		'name' => 'sub_sub_cat_for_2',
    		'user_id' => 1,
    		'parent_id' => $subcategory->id
    	]);  

    	$subcategory2 = App\Category::create([
    		'name' => 'sub_cat_for_3',
    		'user_id' => 1,
    		'parent_id' => 3
    	]);   

    	$user2category = App\Category::create([
    		'name' => 'kakkos_userin kateogria',
    		'user_id' => 2,
    		'parent_id' => null
    	]);   

    }
}
