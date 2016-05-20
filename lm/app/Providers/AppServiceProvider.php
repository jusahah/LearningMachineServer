<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Item;
use App\LatestAddition;
use App\Sequenceable;
use App\Question;
use App\Sequence;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Create or update latestAddition model
        Item::created(function($item) {
            try {
                $la = LatestAddition::where('user_id', $item->user_id)->firstOrFail();
                $la->item_id = $item->id;
                $la->save();
            } catch (ModelNotFoundException $e) {
                LatestAddition::create([
                    'item_id' => $item->id,
                    'user_id' => $item->user_id
                ]);             
            }
        });
        // Create sequenceable model for this item
        Sequence::created(function($sequence) {
            Sequenceable::create([
                'user_id' => $sequence->user_id,
                'sequenceable_id' => $sequence->id,
                'sequenceable_type' => Sequence::class
            ]);
        });

        Sequence::deleted(function($sequence) {
            // Delete sequenceables when its item type
            echo "Deleting sequence";
            try {
                $sequenceable = Sequenceable::where('sequenceable_id', $sequence->id)
                    ->where('sequenceable_type', 'App\Sequence')->firstOrFail(); 
                $sequenceable->delete();  

            } catch (ModelNotFoundException $e) {


            }

        });
        /*
        // Create sequenceable model for this item
        Item::created(function($item) {
            Sequenceable::create([
                'user_id' => $item->user_id,
                'sequenceable_id' => $item->id,
                'sequenceable_type' => Item::class
            ]);
        });
        */

        Item::deleted(function($item) {
            // Delete sequenceables when its item type
            echo "Deleting item";
            return;
            try {
                $sequenceable = Sequenceable::where('sequenceable_id', $item->id)
                    ->where('sequenceable_type', 'App\Item')->firstOrFail(); 
                $sequenceable->delete();  

            } catch (ModelNotFoundException $e) {


            }

        });


        Question::deleted(function($question) {
            // Delete sequenceables when its question type
            echo "Deleting question";
            try {
                $sequenceable = Sequenceable::where('sequenceable_id', $question->id)
                    ->where('sequenceable_type', 'App\Question')->firstOrFail(); 
                $sequenceable->delete();  
                                 
            } catch (ModelNotFoundException $e) {
                

            }

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
