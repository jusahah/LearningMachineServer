<?php

use Illuminate\Database\Seeder;

class ImageItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\ImageItem::createItem([
    		'name' => 'Image1',
    		'summary' => 'Kissakuva kissasta',
    		'category_id' => 6,
    		'user_id' => 1,
    		'imagepath' => 'aws.amazon.com/8u4j54i3',
    		'thumbnail' => 'ERJerwj35MRsjmkr=KrrskmRKRSKKRSKRSkj5eje5e'
    	]);
    }
}
