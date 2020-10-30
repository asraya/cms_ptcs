<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Validator,Redirect,Response;
use DB;
use Session;
use App\IThelpdesk;
use App\GAhelpdesk;
use App\User;

class HelpdeskRequestController extends Controller
{
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('pages.helpdesk.it.create',compact('roles'));
    }
    public function itdatatables()
    {
        $data = IThelpdesk::query()
        ->select([
            'tran_helpdesk.help_id as help_id',
            'tran_helpdesk.help_ticket as help_ticket',
            'tran_helpdesk.help_type as help_type',
            'tran_helpdesk.help_file as help_file',
            'tran_helpdesk.help_reqdate as help_reqdate',
            'tran_helpdesk.help_solvedate as help_solvedate',
            'tran_helpdesk.help_status as help_status',
            'tbl_users.user_firstname',
            'tbl_users.user_lastname'
        ])
        ->leftJoin('tbl_users', 'tran_helpdesk.emp_id', '=', 'tbl_users.emp_id');                
        return Datatables::of($data)
        ->addColumn('employee_name', function($data){
            return $data->user_firstname . " " . $data->user_lastname;
        })
        ->addIndexColumn()
                ->addColumn('action', function($data){
                       
                       $editUrl = url('edit/'.$data->user_id);
                       $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="btn-sm fa fa-bars"></a>';
                    //    $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm">View</a>';
                    //    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->user_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
    
                        return $btn;
                        
                })
     ->rawColumns(['action'])
     ->make(true);
     
    }
    public function gadatatables()
    {
        $data = GAhelpdesk::query()
            ->select([
                'tran_gahelpdesk.help_id as help_id',
                'tran_gahelpdesk.help_ticket as help_ticket',
                'tran_gahelpdesk.help_type as help_type',
                'tran_gahelpdesk.help_file as help_file',
                'tran_gahelpdesk.help_reqdate as help_reqdate',
                'tran_gahelpdesk.help_solvedate as help_solvedate',
                'tran_gahelpdesk.help_status as help_status',
                'tbl_users.user_firstname',
                'tbl_users.user_lastname'
            ])
            ->leftJoin('tbl_users', 'tran_gahelpdesk.emp_id', '=', 'tbl_users.emp_id');                
            return Datatables::of($data)
            ->addColumn('employee_name', function($data){
                return $data->user_firstname . " " . $data->user_lastname;
            })
        ->addIndexColumn()
                ->addColumn('action', function($data){
                       
                       $editUrl = url('edit/'.$data->user_id);
                       $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="btn-sm fa fa-bars"></a>';
                    //    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->user_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
    
                        return $btn;
                        
                })
     ->rawColumns(['action'])
     ->make(true);
    }
}
