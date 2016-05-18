<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Item;

class Category extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function items() {
    	return $this->hasMany('App\Item');
    }

    public function hasParent() {
    	return $this->parent_id != null;
    }

    public function numberOfOwnItems() {
    	return $this->items->count();
    }

    public function allItems() {

    	// This will be somewhat DB-heavy query

    	// First we resolve what subcategories this category has
    	$userCategories = self::where('user_id', \Auth::id())->get();

    	$foundCategories = self::getAllChildCategories($this->id, $userCategories);
    	array_push($foundCategories, $this);
    	$idsForItemSearch = collect($foundCategories)->flatten()->map(function($category) {
    		return $category->id;
    	});

    	return Item::getAllItemsBasedOnCategoryIds($idsForItemSearch);

    }

    protected static function getAllChildCategories($forId, $categories) {

    	$directChildren = $categories->filter(function($c) use ($forId) {
    		return $c->parent_id == $forId;
    	});
    	
    	if ($directChildren->count() === 0) return [];
    	$kidKids = [];
    	foreach ($directChildren as $key => $kidCategory) {
    		array_push($kidKids, $kidCategory);
    		array_push($kidKids, self::getAllChildCategories($kidCategory->id, $categories));
    	}

    	return $kidKids;
    }

    public static function createCategoryTree($categories) {
    	

    	$results = self::parseTree($categories, null);
    	//dd($results);
    	$sums = self::getSums($results);

    	$flattened = [];
    	self::flattenTree($results, $flattened);
    	foreach ($flattened as $key => &$flatNode) {
    		$flatNode['itemsum'] = $sums[$flatNode['category']->id];
    	}
    	return $flattened;
    }

    protected static function parseTree($tree, $root = null) {

    	// From StackOverflow
	    $return = array();
	    # Traverse the tree and search for direct children of the root
	    foreach($tree as $key => $node) {

	        # A direct child is found
	        if($node->parent_id == $root) {

	            # Remove item from tree (we don't need to traverse this again)
	            unset($tree[$key]);
	            # Append the child into result array and parse its children
	            $return[] = array(
	                'category' => $node,
	                'children' => self::parseTree($tree, $node->id)
	            );
	        }
	    }
	    return empty($return) ? null : $return;    
	}

	protected static function calculateSumSubTree(&$node, &$gatherSums) {
		if ($node['children']) {
			$totalSum = 0;

			foreach ($node['children'] as $key => $kidNode) {
				$totalSum += self::calculateSumSubTree($kidNode, $gatherSums);
			}
			$node['itemsum'] = $node['category']->items->count() + $totalSum;
		} else {
			$node['itemsum'] = $node['category']->items->count();
		}
		$gatherSums[$node['category']->id] = $node['itemsum'];
		return $node['itemsum'];
	}

	protected static function getSums(&$categories) {
		$gatherSums = [];
		foreach ($categories as $key => $arrNode) {
			self::calculateSumSubTree($arrNode, $gatherSums);
		}

		return $gatherSums;
	}

	protected static function flattenTree($tree, &$flatten, $depth = 0) {
		
		foreach ($tree as $key => $node) {
			array_push($flatten, ['category' => $node['category'], 'depth' => $depth]);
			if ($node['children']) {
				self::flattenTree($node['children'], $flatten, $depth+1);
			}
		}
	}


	// Display functions
	public function marginLeft($depth = 0) {
		return str_repeat("-", $depth*2);
	}

}
