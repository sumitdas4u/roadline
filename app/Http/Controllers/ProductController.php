<?php

namespace App\Http\Controllers;

use App\Adapters\ProductAdapter;
use App\Attribute;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {
        $truckTypes = Product::paginate(15);
        //echo \GuzzleHttp\json_encode($truckTypes);
        $page_title = 'Truck Types';
        $page_description = '';
        return view('pages.trucktype.list', compact('page_title', 'page_description','truckTypes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function create()
    {
        $page_title = 'Truck Type';
        $page_description = 'Add New';

        $categories = Category::ParentOnly()->Active()->get();
        $attibutes = Attribute::Active()->get()->values()->load('values');

    // echo  \GuzzleHttp\json_encode($attibutes);;
    return view('pages.trucktype.create', compact('page_title', 'page_description','categories','attibutes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'category' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);

        } else {


            $file = $request->file('photo');
            $path = $file->hashName();
            $image = Image::make($file);
            Storage::put($path, (string) $image->encode());
            $image->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('thumb_'.$path, (string) $image->encode());
            DB::beginTransaction();

            try {

                $product = Product::create([
                    'name' => $request->name,
                    'photos'=>$path,
                    'category_id' => $request->category, // Category Model
                    'is_active' => true
                ]);

                $product->attributesValues()->sync($request->get('attributes'));
               DB::commit();
            } catch (\Throwable $err) {
                DB::rollBack();
                return Redirect::back()->withErrors($err->getMessage());
            }



            return Redirect::to('product')->with('status', 'truck type successfully added');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function edit($id)
    {
        $product= Product::find($id);

        $categories = Category::ParentOnly()->Active()->get();
        $attibutes = Attribute::Active()->get()->values()->load('values');
        $page_title = $product->name;
        $page_description = 'Edit';
        return view('pages.trucktype.edit', compact('page_title', 'page_description','product','categories','attibutes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = array(
        'name' => 'required',
        'category' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator);


        } else {

            $product = Product::find($id);
            $file = $request->file('photo');
            if ($file){

                $path = $file->hashName();
            $image = Image::make($file);
            Storage::put($path, (string)$image->encode());
            $image->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('thumb_' . $path, (string)$image->encode());
                $product->photos =            $path;
                $product->save();
        }
            DB::beginTransaction();

            try {


                $product->attributesValues()->sync($request->get('attributes'));
                $product->name              = $request->name;
                $product->category_id       = $request->category;
                $product->save();

                DB::commit();
            } catch (\Throwable $err) {
                DB::rollBack();
                return Redirect::back()->withErrors($err->getMessage());
            }


            return Redirect::to('product')->with('status', 'product successfully changed');
        }
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

            $product = Product::find($request->id);
            $product->is_active       = $request->status;

            $product->save();
            return response()->json(['message' => ' status updated successfully.'],200);

        }
    }
    public function search(Request $request)
    {
        $query = Product::query();



        if(!empty($request->keyword)){
            $query->where('name', 'like', '%'.$request->keyword.'%');

        }
        if($request->status>-1){
            $query->where('is_active', '=', $request->status);
        }



        $truckTypes =$query->paginate(15);

        $page_title = 'Categories';
        $page_description = 'List of Category';
        return view('pages.trucktype.list', compact('page_title', 'page_description','truckTypes'));

    }


    public function productListApi($id=null){


        if($id==null){
            $product = Product::active()->get();
        }else{
            $product = Product::where('category_id',$id)->active()->get();
        }



        $productResourceCollection = ProductAdapter::collection($product);

        return $productResourceCollection;
    }
}
