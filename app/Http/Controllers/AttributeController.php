<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeValue;
use App\Exceptions\InvalidAttributeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {
        $attributes = Attribute::paginate(15);
        $page_title = 'Attributes';
        $page_description = 'List of all attributed used in product';
        return view('pages.attribute.list', compact('page_title', 'page_description','attributes'));
    }

    public function indexValue($id)
    {
        $attribute = Attribute::find($id);
        $page_title = $attribute->name;
        $attributesValue = $attribute->values()->get();

        $page_description = 'List of all attribute values';
        return view('pages.attribute.attributevalues.list', compact('page_title', 'page_description','attributesValue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function create()
    {
        $page_title = 'Attributes';
        $page_description = 'Add New';
        return view('pages.attribute.create', compact('page_title', 'page_description'));

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
            'name' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {

            return Redirect::to('attribute/')
                ->withErrors($validator);

        } else {

            $attributes = new Attribute();
            $attributes->addAttributes(explode(",",$request->name));


            return Redirect::to('attribute')->with('status', 'attributes successfully added');
        }
    }

    public function show($id)
    {

    }
    public function createValues($id)
    {
        $attribute = Attribute::find($id);
        $attribute->values;
        $page_title = $attribute->name;
        $page_description = 'Add values';
        return view('pages.attribute.attributevalues.create', compact('page_title', 'page_description','attribute'));

    }
    public function edit($id)
    {
        $attribute = Attribute::find($id);
        $page_title = $attribute->name;
        $page_description = 'Edit';
        return view('pages.attribute.edit', compact('page_title', 'page_description','attribute'));

    }
    public function editValues($id)
    {
        $attributeValue = AttributeValue::find($id);
        $page_title = $attributeValue->value;
        $page_description = 'Edit';

       return view('pages.attribute.attributevalues.edit', compact('page_title', 'page_description','attributeValue'));

    }
    public function update(Request $request, $id)
    {
        $rules = array(
            'name'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {

            return Redirect::to('attribute/' . $id . '/edit')
                ->withErrors($validator);

        } else {

            $category = Attribute::find($id);
            $category->name       = $request->name;

            $category->save();

            return Redirect::to('attribute')->with('status', 'Attribute succesfully changed');
        }
    }
    public function updateValues(Request $request, $id)
    {
        $rules = array(
            'value'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
         } else {

            $value = AttributeValue::find($id);
            $value->value       = $request->value;
            $value->save();

            return Redirect::route('attribute-values-index',[$value->attribute->id])->with('status', 'value successfully changed');
        }
    }
    public function storeValues(Request $request, $id)
    {
        $rules = array(
            'value'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {

            return Redirect::to('attribute/values/' . $id . '/edit')
                ->withErrors($validator);

        } else {

            $attribute = Attribute::find($id);
            $attribute->addValue(explode(",",$request->value));
            return Redirect::to('attribute')->with('status', 'Attribute successfully added');
        }
    }

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

            $category = Attribute::find($request->id);
            $category->is_active       = $request->status;

            $category->save();
            return response()->json(['message' => ' status updated successfully.'],200);

        }
    }
    public function valueStatusUpdateApi(Request $request)
    {
        $rules = array(
            'status'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return response()->json(['message' => 'something went wrong.'],400);

        } else {

            $attributeValue = AttributeValue::find($request->id);
            $attributeValue->is_active       = $request->status;

            $attributeValue->save();
            return response()->json(['message' => ' status updated successfully.'],200);

        }
    }
    public function deleteValues($id)
    {


            $attributeValue = AttributeValue::find($id);
            $attributeValue->delete();
        return Redirect::back()->with('status', 'successfully deleted');


    }
    public function search(Request $request)
    {
        $query = Attribute::query();



        if(!empty($request->keyword)){
            $query->where('name', 'like', '%'.$request->keyword.'%');

        }
        if($request->status>-1){
            $query->where('is_active', '=', $request->status);
        }


        $attributes =$query->paginate(15);

        $page_title = 'Attribute Search Result';
        $page_description = 'List of Attributes';
        return view('pages.attribute.list', compact('page_title', 'page_description','attributes'));

    }
}
