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

    	$imagedata = file_get_contents(asset('learningmachinelaravel/lm/public/test_thumbnail.jpg'));
    	$base64 = base64_encode($imagedata);

		App\ImageItem::createItem([
    		'name' => 'Image1',
    		'summary' => 'Kissakuva kissasta',
    		'category_id' => 6,
    		'user_id' => 1,
    		'tags' => 'PHP,Javascript,Node.js',
    		'imagepath' => 'aws.amazon.com/8u4j54i3',
    		'thumbnail' => $base64
    	]);

		App\ImageItem::createItem([
    		'name' => 'Image2',
    		'summary' => 'Koirakuva koirasta',
    		'category_id' => 4,
    		'user_id' => 1,
    		'tags' => 'PHP,Javascript,Clojure',
    		'imagepath' => 'aws.amazon.com/8u4j54i3koira',
    		'thumbnail' => $base64
    	]);  

		App\ImageItem::createItem([
    		'name' => 'Päivänkakkara',
    		'summary' => 'Although implode() can, for historical reasons, accept its parameters in either order, explode() cannot. You must ensure that the delimiter argument comes before the string argument.',
    		'category_id' => 4,
    		'user_id' => 1,
    		'tags' => 'PHP,Javascript',
    		'imagepath' => 'aws.amazon.com/8u4j54i3koira',
    		'thumbnail' => $base64
    	]);  

    }

}
