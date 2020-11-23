<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
          $page_title = 'Maintenace';
        return view('error', compact('page_title'));
    }
}
