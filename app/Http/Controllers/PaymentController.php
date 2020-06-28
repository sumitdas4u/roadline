<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {

        if(Auth::user()->hasRole('admin')){
            $payments = Payment::paginate(15);
        }else{
            $payments = Payment::where('user_id',Auth::user()->id)->paginate(15);
        }

        $page_title = 'Payment Entry';
        $page_description = 'List of all Payment History';
        return view('pages.payment.list', compact('page_title', 'page_description','payments'));
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
        $quotation = Quotation::find($request->quotation_id);


        if(!is_null($quotation)){
            $payment=Payment::create([
                'quotation_id' => $quotation->id,
                'enquiry_id' => $quotation->enquiry_id,
                'user_id' => $quotation->user_id,
                'status' => 1
            ]);
            return Redirect::route('payment.edit',$payment->id)->with('status', 'payment created successfully.');
        }
        else{

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payments
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function edit($id)
    {

        $payment = Payment::find($id);
        $page_title = 'payment';
        $page_description = 'Edit';
        return view('pages.payment.edit', compact('page_title', 'page_description','payment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payments
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'payment_date'       => 'required|date',
            'payment_mode'       => 'required',
            'amount'             => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {

            return Redirect::to('payment/' . $id . '/edit')
                ->withErrors($validator);

        } else {


            $payment = Payment::find($id);
            $payment->amount         = $request->amount;
            $payment->payment_date         =  $request->payment_date ;
            $payment->payment_mode         = $request->payment_mode;
            $payment->status         = $request->status;
            $payment->save();

            return Redirect::to('payment')->with('status', 'payment entry succesfully changed');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
