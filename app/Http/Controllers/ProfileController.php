<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Session;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('pages.profile.index', compact('profile'));
    }
}
