<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Item;
use App\LatestAddition;

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
        Item::created(function($item) {
            echo "Item created: " . $item->id . " with type " . $item->itenable_type;
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
