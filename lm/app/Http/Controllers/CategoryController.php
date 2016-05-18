<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Category;
use App\Http\Requests\NewCategoryRequest;

class CategoryController extends Controller
{

    public function __construct() {
        // Auth middleware already run

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('user_id', \Auth::id())->get();
        $flattened = Category::createCategoryTree($categories);
        
        return view('categories.list', compact('flattened'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Consider Russian doll caching somewhere here
        $categories = Category::where('user_id', \Auth::id())->get();
        $flattened = Category::createCategoryTree($categories);

        return view('categories.create', compact('flattened'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewCategoryRequest $request)
    {
        // Validated in form request object

        $name     = $request->get('name');
        $parentID = (int)$request->get('parentid');

        if ($parentID != 0) {
            try {
                $parentCategory = Category::findOrFail($parentID);
            }catch(ModelNotFoundException $e){
                // Parent category not found
                \Session::flash('danger', 'Parent category does not exist in database');
                return redirect()->back();
            }
        }

        // Note!
        // We should seriously consider moving this into use-case
        // or into User class where we can associate it automatically to user

        $c = Category::create([
            'user_id' => \Auth::id(),
            'name' => $name,
            'parent_id' => $parentID == 0 ? null : $parentID
        ]);

        \Session::flash('success', 'Category created!');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.single', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
