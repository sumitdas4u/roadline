<?php

namespace App\Http\Controllers;

use App\Enquiry;

use App\Quotation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')){
            $quotations = Quotation::paginate(15);
        }else{
            $quotations = Quotation::where('user_id',Auth::user()->id)->paginate(15);
        }

        $page_title = 'Quotations';
        $page_description = 'List of all quotations';
        return view('pages.quotation.list', compact('page_title', 'page_description','quotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $enquiry = Enquiry::find($request->enquiry_id);


        if(!is_null($enquiry)){
            $quotation=Quotation::create([
                'enquiry_id' => $enquiry->id,
                'truck_type_id' => $enquiry->truck_type_id,
                'goods_type_id' => $enquiry->goods_type_id,
                'user_id' => $enquiry->user_id,
                'pickup_address' => $enquiry->pickup_address,
                'drop_address' =>  $enquiry->drop_address,
                'shipment_date' => $enquiry->shipment_date,
                'shipment_weight' =>  $enquiry->shipment_weight,
                'status' => 1
            ]);
            return Redirect::route('quotation.edit',$quotation->id)->with('status', 'Quotation created successfully.');
        }
        else{

            Quotation::create([
                'truck_type_id' =>      $request->truck_type_id,
                'goods_type_id' =>      collect($request->goods_type_id)->pluck('id'),
                'user_id' =>            $request->user_id,
                'pickup_address' =>     $request->pickup_address,
                'drop_address' =>       $request->drop_address,
                'shipment_date' =>      $request->shipment_date,
                'shipment_weight' =>    $request->shipment_weight,
                'price' =>              $request->price,
                'notes' =>              $request->notes,
                'status' => 1
            ]);
        }


    }

    /**
     * Display the specified resource.

     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**

     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function edit($id)
    {

        $quotation = Quotation::find($id);
        $page_title = 'Quotation';
        $page_description = 'Edit';
        return view('pages.quotation.edit', compact('page_title', 'page_description','quotation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'price'       => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {

            return Redirect::to('quotation/' . $id . '/edit')
                ->withErrors($validator);

        } else {

            $quotation = Quotation::find($id);
            $quotation->price       = $request->price;
            $quotation->notes      = $request->notes;
            $quotation->save();

            return Redirect::to('quotation')->with('status', 'quotation succesfully changed');
        }

    }

    /**
     * Remove the specified resource from storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
