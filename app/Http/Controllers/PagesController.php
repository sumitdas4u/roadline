<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('pages.home', compact('page_title', 'page_description'));
    }

    public function enquiry_popoup()
    {
        $page_title = 'Enquiry';
        $page_description = 'Some description for the page';

        return view('pages.enquiry.new_enquiry', compact('page_title', 'page_description'));
    }

    // Datatables
    public function datatables()
    {
        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('pages.datatables', compact('page_title', 'page_description'));
    }

    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // Select2
    public function select2()
    {
        $page_title = 'Select 2';
        $page_description = 'This is Select2 test page';

        return view('pages.select2', compact('page_title', 'page_description'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }
    public function passwordChange()
    {
        $page_title = 'Password Change';
        $page_description = 'Use strong password ';
        return view('auth.passwords.change', compact('page_title', 'page_description'));


    }
}
