<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Item;
use App\LatestAddition;
use App\Sequenceable;
use App\Question;

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
        Item::created(function($item) {
            Sequenceable::create([
                'sequenceable_id' => $item->id,
                'sequenceable_type' => Item::class
            ]);
        });

        // Create sequenceable model for this question
        Question::created(function($question) {
            Sequenceable::create([
                'sequenceable_id' => $question->id,
                'sequenceable_type' => Question::class
            ]);
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
