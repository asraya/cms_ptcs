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
use App\ListItStock;
use App\User;

class ListItStockController extends Controller
{
    
        public function datatables()
        {
            return datatables ( ListItStock::all())
            ->addIndexColumn()
                    ->addColumn('action', function($data){
                           
                           $editUrl = url('edit/'.$data ->user_id);
                           $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="btn-sm fa fa-bars"></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->user_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
        
                            return $btn;
                            
                    })
         ->rawColumns(['action'])
         ->make(true);
         
        }
        public function create()
        {
            $roles = Role::pluck('name','name')->all();
            return view('pages.listitstock.create',compact('roles'));
        }
    }
