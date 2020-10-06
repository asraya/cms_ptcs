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
        $page_title = 'Spt request';
        // $page_description = 'This is spt_request test page';

        return view('pages.sendemail', compact('page_title'));
    }
    //spt
    public function spt_request()
    {
        $page_title = 'Spt request';
        // $page_description = 'This is spt_request test page';

        return view('pages.spt.spt_request', compact('page_title'));
    }
    //elearn
     public function elearn()
    {
        $page_title = 'elearn';
        $page_description = 'This is elearn test page';

        return view('pages.elearn.data_learn', compact('page_title', 'page_description'));
    }
    public function role()
    {
        $page_title = 'spt_request';
        $page_description = 'This is spt_request test page';

        return view('pages.role.role', compact('page_title', 'page_description'));
    }
    public function listdatatables()
    {
        $page_title = 'List IT Stoct';

        return view('pages.listitstock.data_list', compact('page_title'));
    }

    public function itdatatables()
    {
        $page_title = 'it helpdesk';
        // $page_description = 'Corporate Management Systems';

        return view('pages.helpdesk.it.it_helpdesk', compact('page_title'));
    }
    public function data_user()
    {
        $page_title = 'User Data';
        // $page_description = 'Corporate Management Systems';

        return view('pages.user.data_user', compact('page_title'));
    }

    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // add_user
    public function add_user()
    {
        $page_title = 'add user';
        $page_description = 'This is add_user test page';

        return view('pages.user.add_user', compact('page_title', 'page_description'));
    }
    public function add_spt()
    {
        $page_title = 'add user';
        $page_description = 'This is add_user test page';

        return view('pages.spt.add_spt', compact('page_title', 'page_description'));
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
