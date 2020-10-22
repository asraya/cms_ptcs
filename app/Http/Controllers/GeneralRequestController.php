<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Validator,Redirect,Response;
use App\GeneralRequest;
use App\Souvenir;
use App\Stationary;
use App\User;
use App\Tbl_users;
use Darryldecode\Cart\CartCondition;
use DB;
use Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class GeneralRequestController extends Controller
{

    //tanpajoin
    // public function general_requestdatatables()
    // {        
    //     return datatables ( GeneralRequest::all())
    //     ->addIndexColumn()
    //             ->addColumn('action', function($data){
                       
    //                    $editUrl = url('edit/'.$data->id);
    //                    $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="btn-sm fa fa-bars"></a>';
    //                 //    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->user_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
    
    //                     return $btn;
                        
    //             })
    //  ->rawColumns(['action'])
    //  ->make(true);
    // }
        public function general_requestdatatables(){
        $data = GeneralRequest::query()
                ->select([
                    'tran_general.gen_id as gen_id',
                    'tran_general.gen_ticket as gen_ticket',
                    'tran_general.gen_date_req as gen_date_req',
                    'tran_general.gen_status as gen_status',
                    'tbl_users.user_firstname',
                    'tbl_users.user_lastname'
                ])
                ->leftJoin('tbl_users', 'tran_general.emp_id', '=', 'tbl_users.emp_id');   
                
                return Datatables::of($data)
                ->addColumn('employee_name', function($data){
                    return $data->user_firstname . " " . $data->user_lastname;
                })
                
                ->addIndexColumn()                
                            ->addColumn('action', function($data){
                                   
                                   $editUrl = url('edit/'.$data->id);
                                   $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="btn-sm fa fa-bars"></a>';
                                //    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->user_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
                
                                    return $btn;
                                    
                            })
                 ->rawColumns(['action'])
                 ->make(true);

        }    
        public function create()
    {
        $stationary = DB::table('para_stationary')->pluck("name_stat","id_item");
        return view('pages.generalrequest.create',compact('stationary'));
    }
    
    // public function create()
    // {
    //   $stationary = DB::table('para_stationary')->pluck("name_stat","id_item");
    //   return view('pages.generalrequest.create',compact('stationary'));
    // }
   
}
