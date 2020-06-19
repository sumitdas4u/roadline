<?php

namespace App\Http\Controllers;

use App\Adapters\CategoryAdapter;
use App\Category;
use App\Http\Helper\ResponseBuilderHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {

        $categories = Category::paginate(15);
        $page_title = 'Category';
        $page_description = 'Some description for the page';
       return view('pages.category.list', compact('page_title', 'page_description','categories'));

    }
    public function search(Request $request)
    {
        $query = Category::query();



        if(!empty($request->keyword)){
            $query->where('name', 'like', '%'.$request->keyword.'%');

        }
        if($request->status>-1){
            $query->where('is_active', '=', $request->status);
        }
        if($request->isparent==1){
            $query->whereNull('parent_id');
        }


        $categories =$query->paginate(15);

        $page_title = 'Categories';
        $page_description = 'List of Category';
        return view('pages.category.list', compact('page_title', 'page_description','categories'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function create()
    {

        $page_title = 'Category';
        $page_description = 'Add New';
        return view('pages.category.create', compact('page_title', 'page_description'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Laravel\Lumen\Http\Redirector
     */
    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {

            return Redirect::to('categories/' . $id . '/edit')
                ->withErrors($validator);

        } else {

            $parent_id = $request->parent_id ? $request->parent_id : null;

            $parent = Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'parent_id' => $parent_id,
                'is_active' => 1
            ]);

            return Redirect::to('categories')->with('status', 'Category successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
// validate
        // read more on validation at http://laravel.com/docs/validation

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $page_title = $category->name;
        $page_description = 'Edit';
        return view('pages.category.edit', compact('page_title', 'page_description','category','parent'));

    }


    public function update(Request $request, $id)
    {
        $rules = array(
            'name'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {

            return Redirect::to('categories/' . $id . '/edit')
                ->withErrors($validator);

        } else {

            $category = Category::find($id);
            $category->name       = $request->name;
            $category->description      = $request->description;
            $category->save();

            return Redirect::to('categories')->with('status', 'Category succesfully changed');
        }
    }

    public function statusUpdateApi(Request $request)
    {
        $rules = array(
            'status'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return response()->json(['message' => 'something went wrong.'],400);

        } else {

            $category = Category::find($request->id);
            $category->is_active       = $request->status;

            $category->save();
            return response()->json(['message' => ' status updated successfully.'],200);

        }
    }
    public function destroy($id)
    {
        //
    }
    public function categoryListApi()
    {
        $category = Category::active()->get();

        $categoryResourceCollection = CategoryAdapter::collection($category);

        return $categoryResourceCollection;
    }

}
