<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('pages.dashboard', compact('page_title', 'page_description'));
    }

    /**
     * Demo methods below
     */
    public function sendemail()
    {
        $page_title = 'spt_request';
        $page_description = 'This is spt_request test page';

        return view('pages.sendemail', compact('page_title', 'page_description'));
    }
    //spt
    public function spt_request()
    {
        $page_title = 'spt_request';
        $page_description = 'This is spt_request test page';

        return view('pages.spt.spt_request', compact('page_title', 'page_description'));
    }
    public function role()
    {
        $page_title = 'spt_request';
        $page_description = 'This is spt_request test page';

        return view('pages.role.index', compact('page_title', 'page_description'));
    }
    // Datatables
    public function datatables()
    {
        $page_title = 'User Data';
        $page_description = 'Corporate Management Systems';

        return view('pages.user.datatables', compact('page_title', 'page_description'));
    }

    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // add
    public function add()
    {
        $page_title = 'Select 2';
        $page_description = 'This is add test page';

        return view('pages.add', compact('page_title', 'page_description'));
    }

    // custom-icons
    public function customIcons()
    {
        $page_title = 'customIcons';
        $page_description = 'This is customIcons test page';

        return view('pages.icons.custom-icons', compact('page_title', 'page_description'));
    }

    // flaticon
    public function flaticon()
    {
        $page_title = 'flaticon';
        $page_description = 'This is flaticon test page';

        return view('pages.icons.flaticon', compact('page_title', 'page_description'));
    }

    // fontawesome
    public function fontawesome()
    {
        $page_title = 'fontawesome';
        $page_description = 'This is fontawesome test page';

        return view('pages.icons.fontawesome', compact('page_title', 'page_description'));
    }

    // lineawesome
    public function lineawesome()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';

        return view('pages.icons.lineawesome', compact('page_title', 'page_description'));
    }

    // socicons
    public function socicons()
    {
        $page_title = 'socicons';
        $page_description = 'This is socicons test page';

        return view('pages.icons.socicons', compact('page_title', 'page_description'));
    }

    // svg
    public function svg()
    {
        $page_title = 'svg';
        $page_description = 'This is svg test page';

        return view('pages.icons.svg', compact('page_title', 'page_description'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }
}
