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
        return datatables ( Elearn::all())
        ->join('tbl_users', 'user_name.user_id', '=', 'tbl_users.user_id')

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