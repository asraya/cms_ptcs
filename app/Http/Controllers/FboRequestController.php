<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FboRequest;
use DataTables;
use Validator,Redirect,Response;

class FboRequestController extends Controller

    {
        public function fbodatatables()
        {
        $data = FboRequest::query()
        ->select([
            'tran_fbo.fbo_ticket as fbo_ticket',
            'tran_fbo.so_number as so_number',
            'tran_fbo.pr_number as pr_number',
            'tran_fbo.fbo_status as fbo_status',
            'tbl_users.user_firstname',
            'tbl_users.user_lastname'
        ])
        ->leftJoin('tbl_users', 'tran_fbo.emp_id', '=', 'tbl_users.emp_id');   
        
        return Datatables::of($data)
        ->addColumn('employee_name', function($data){
            return $data->user_firstname . " " . $data->user_lastname;
        })
        ->addIndexColumn()
                ->addColumn('action', function($data){
                       
                       $editUrl = url('edit/'.$data->id);
                       $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';
                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
    
                        return $btn;
                        
                })
     ->rawColumns(['action'])
     ->make(true);
    }
}
