<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocApproveController extends Controller
{
    public function index()
    {
          $page_title = 'Maintenance';
        return view('error', compact('page_title'));
    }
}
