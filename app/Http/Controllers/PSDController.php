<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PSDController extends Controller
{
    public function index()
    {
          $page_title = 'Maintenance';
        return view('error', compact('page_title'));
    }
}
