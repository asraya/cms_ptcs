<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Elearn;
use DataTables;
use Validator,Redirect,Response;

class ElearnController extends Controller
{
    public function datatables()
    {
        $data = Elearn::query()
        ->select([
            'tran_elearning.learn_ticket as learn_ticket',
            'tran_elearning.learn_approval as learn_approval',
            'tran_elearning.learn_register as learn_register',
            'tbl_users.user_firstname',
            'tbl_users.user_lastname'
        ])
        ->leftJoin('tbl_users', 'tran_elearning.emp_id', '=', 'tbl_users.emp_id');   
        
        return Datatables::of($data)
        ->addColumn('employee_name', function($data){
            return $data->user_firstname . " " . $data->user_lastname;
        })
        ->addIndexColumn()
                ->addColumn('action', function($data){
                       
                       $editUrl = url('edit/'.$data->emp_id);
                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->emp_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>';

                     
                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
                        return $btn;
                        
                })
     ->rawColumns(['action'])
     ->make(true);
    }
    public function edit($id)
    {
        $Elearn = Elearn::find($id);
        return response()->json($Elearn);
    }
}