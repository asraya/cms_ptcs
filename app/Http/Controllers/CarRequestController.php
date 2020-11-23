<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarRequestController extends Controller
{
    public function index()
    {
          $page_title = 'Car Request';
        return view('car_request.index', compact('page_title'));
    }
    public function car_list()
    {
          $page_title = 'Car List';
        return view('car_request.car_list.index', compact('page_title'));
    }
    public function driver_list()
    {
          $page_title = 'Driver List';
        return view('car_request.driver_list.index', compact('page_title'));
    }
    public function datatables_car_request()
    {
        // $users1 = Role::with('user');
        $users = Auth::user()->emp_id;
        $who_login = User::find(Auth::user()->id);
        //dd($who_login);
        //dd($who_login->getRoleNames()[0]);
        $data = DB::table('tran_trip')
        
        ->select([
            'tran_trip.id as id',
            'tran_trip.trip_purpose as trip_purpose',
            'tran_trip.trip_name as trip_name',
            'tbl_users.user_firstname',
            'tbl_users.user_lastname',
            'tbl_users.user_leader_id',

        ])        
        ->leftJoin('tbl_users', 'tran_trip.emp_id', '=', 'tbl_users.emp_id');
        if($who_login->hasRole(['User', 'IT','Sekretaris'])){
            $data->where('tran_trip.emp_id', $users);
            // ->orwhere('id', '1', $users1);
        }elseif($who_login->hasRole(['HRD'])){
            
        }

        // if($filter_status){
        //     $data->where('status', $status);
        // }
        $data->get();

        return DataTables::of($data)    
        ->addColumn('employee_name', function($data){
                    return $data->user_firstname . " " . $data->user_lastname;
                })
                ->addColumn('action', function ($data) {
             
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit"  class="btn-sm fa fa-bars editStockout"></a>'; 
                    // $button = '<a class="btn btn-sm btn-info" href="' . route('stockout.show', $stockout->id) . '" >Show <i class="fa fa-eye"></i></a>';
                    if (\Auth::user()->can('role-show-req-stationary')) {
                        $button = '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="' . route('stockout.show', $data->id) . '" >Edit <i class="fa fa-edit"></i></a>';
                    }
                    elseif(\Auth::user()->can('users-delete')) {
                        $button = '&nbsp;&nbsp;&nbsp;<a id="' . $data->id . '" class="delete btn btn-sm btn-danger" href="#" >Delete <i class="fa fa-trash"></i></a>';
                    }
                    
                    return $button;
                })
                ->rawColumns(['action'])
                        ->make(true);
                    }

    public function datatables_car_list()
    {
        // $users1 = Role::with('user');
        $users = Auth::user()->emp_id;
        $who_login = User::find(Auth::user()->id);
        //dd($who_login);
        //dd($who_login->getRoleNames()[0]);
        $data = DB::table('tran_trip')
        
        ->select([
            'tran_trip.id as id',
            'tran_trip.trip_purpose as trip_purpose',
            'tran_trip.trip_name as trip_name',
            'tbl_users.user_firstname',
            'tbl_users.user_lastname',
            'tbl_users.user_leader_id',

        ])        
        ->leftJoin('tbl_users', 'tran_trip.emp_id', '=', 'tbl_users.emp_id');
        if($who_login->hasRole(['User', 'IT','Sekretaris'])){
            $data->where('tran_trip.emp_id', $users);
            // ->orwhere('id', '1', $users1);
        }elseif($who_login->hasRole(['HRD'])){
            
        }

        // if($filter_status){
        //     $data->where('status', $status);
        // }
        $data->get();

        return DataTables::of($data)    
        ->addColumn('employee_name', function($data){
                    return $data->user_firstname . " " . $data->user_lastname;
                })
                ->addColumn('action', function ($data) {
             
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit"  class="btn-sm fa fa-bars editStockout"></a>'; 
                    // $button = '<a class="btn btn-sm btn-info" href="' . route('stockout.show', $stockout->id) . '" >Show <i class="fa fa-eye"></i></a>';
                    if (\Auth::user()->can('role-show-req-stationary')) {
                        $button = '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="' . route('stockout.show', $data->id) . '" >Edit <i class="fa fa-edit"></i></a>';
                    }
                    elseif(\Auth::user()->can('users-delete')) {
                        $button = '&nbsp;&nbsp;&nbsp;<a id="' . $data->id . '" class="delete btn btn-sm btn-danger" href="#" >Delete <i class="fa fa-trash"></i></a>';
                    }
                    
                    return $button;
                })
                ->rawColumns(['action'])
                        ->make(true);
                    }
  }
