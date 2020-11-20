<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          $page_title = 'Dashboard';
        return view('home', compact('page_title'));
    }
  
    public function calendarIndex(Calendar $calendar)
    {
        return view('calendar.index');
    }

    public function allCalendar(Calendar $calendar)
    {
        $calendar = $calendar->select('id', 'date', 'title', 'desc')->get()->toJson();
        return response($calendar);
    }

    public function deleteCalendar($id, Calendar $calendar)
    {
        $calendar->find($id)->delete();
    }

    public function storeCalendar(Calendar $calendar, Request $request)
    {
      $data = [
        'title' => $request->title,
        'desc' => $request->desc,
        'date' => $request->date,
      ];
      $calendar->create($data);
      return response($request);
    }
}
