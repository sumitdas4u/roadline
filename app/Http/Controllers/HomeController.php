<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified','first_login']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_title = 'home';
        $page_description = 'Some description for the page';

        return view('pages.home', compact('page_title', 'page_description'));


    }
    public function dashboard()
    {
     /*   $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        return view('pages.dashboard', compact('page_title', 'page_description'));*/
        return Redirect::to('enquiry');

    }

}
