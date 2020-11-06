<?php

namespace App\Http\Controllers;
use App\Role;

use App\User;
use App\Stationary;
use App\Historystock;
use App\HistorystockDetail;
use App\Setting;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show($id)
    {
        $stockout = Historystock::with('user')->where('id', $id)->first();
        $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $id)->get();
        $company = Setting::latest()->first();
        return view('stockout.stockout_confirmation', compact('stockout_details', 'stockout', 'company'));
    }
    
    

    public function index()
    {
          $page_title = 'test';
        return view('stockout.pending_stockouts', compact('page_title'));
    }

    public function pending_stockout()
    {
        $users = Auth::user()->emp_id;
        $data = DB::table('historystocks')
        
        ->select([   

            'historystocks.id as id',
            'historystocks.emp_id as emp_id',
            'historystocks.stockout_status as stockout_status',
            'tbl_users.user_firstname',
            'tbl_users.user_lastname',
            'tbl_users.user_id',

        ])
        
        ->leftJoin('tbl_users', 'historystocks.emp_id', '=', 'tbl_users.emp_id')
        ->where('historystocks.emp_id', $users);

        return DataTables::of($data)
        
        ->addColumn('employee_name', function($data){
                    return $data->user_firstname . " " . $data->user_lastname;
                })
                ->addColumn('action', function ($stockout) {
             

            $button = '<a class="btn btn-sm btn-info" href="' . route('stockout.show', $stockout->id) . '" >Show <i class="fa fa-eye"></i></a>';
            if (\Auth::user()->can('user-edit')) {
                $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="' . route('users.edit', $stockout->id) . '" >Edit <i class="fa fa-edit"></i></a>';
            }
            if (\Auth::user()->can('user-delete')) {
                $button .= '&nbsp;&nbsp;&nbsp;<a id="' . $stockout->id . '" class="delete btn btn-sm btn-danger" href="#" >Delete <i class="fa fa-trash"></i></a>';
            }
            return $button;
        })
        ->rawColumns(['action'])
        // ->make(true);  
                ->make(true);
            }
       
    
        // $pendings = Historystock::latest()->with('user')->where('stockout_status', 'pending')->get();
        // return view('stockout.pending_stockouts', compact('pendings'));
        // $users = Auth::user()->emp_id;
        // $data = DB::table('historystocks')
        // ->select([   
          
        //     'historystocks.emp_id as emp_id',
        //     'historystocks.stockout_status as stockout_status',
        //     'tbl_users.user_firstname',
        //     'tbl_users.user_lastname'
        // ])
        // ->leftJoin('tbl_users', 'historystocks.emp_id', '=', 'tbl_users.emp_id'); 
        // return DataTables::of(Historystock::where('emp_id',$users,$data))
        // ->addColumn('employee_name', function($data){
        //             return $data->user_firstname . " " . $data->user_lastname;
        //         })
        // ->addColumn('action',function($stockout){
            
        //     $x='';
        //     if ($stockout->stockout_status=="needApproval") {
        //         # code...
        //         $x.= 'Waiting for confirmation';

        //     } elseif ($stockout->stockout_status=="Rejected") {
                
        //         $x.= 'Your Item Rejected';

        //     } else {
        //         # code...
        //         $x.= '<a class="btn btn-sm btn-warning" href="'.route("stockout.show", $stockout->id).'">Show</a>';
        //     }
        //     return $x;
        //     })
            
    //     ->make(true);
    // }
        // ->addColumn('action', function ($stockout) {
        //     $button = '<a class="btn btn-sm btn-info" href="' . route('stockout.show', $stockout->id) . '" >Show <i class="fa fa-eye"></i></a>';
        //     if (\Auth::user()->can('user-edit')) {
        //         $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="' . route('users.edit', $stockout->id) . '" >Edit <i class="fa fa-edit"></i></a>';
        //     }
        //     if (\Auth::user()->can('user-delete')) {
        //         $button .= '&nbsp;&nbsp;&nbsp;<a id="' . $stockout->id . '" class="delete btn btn-sm btn-danger" href="#" >Delete <i class="fa fa-trash"></i></a>';
        //     }
        //     return $button;
        // })
        // ->rawColumns(['action'])
        // ->make(true);    
    
    public function approved_stockout()
    {
        $approveds = Historystock::latest()->with('user')->where('stockout_status', 'approved')->get();
        return view('stockout.approved_stockouts', compact('approveds'));
    }

    public function stockout_confirm($id)
{
   



        $stockout = Historystock::findOrFail($id);
        $stockout->stockout_status = 'approved';
        // Stationary::where(['id'=>1])->decrement('stock_item', $id);
      

        $stockout->save();   


        $stockout = Stationary::findOrFail(1);
        $stockout = Stationary::where('id', $stockout->id);
        $stockout->decrement('stock_item', 1);
        


        
        Toastr::success('stockout has been Approved! Please delivery the products', 'Success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Historystock::findOrFail($id)->delete();
        Toastr::success('stockout has been deleted', 'Success');
        return redirect()->back();
    }

    public function download($stockout_id)
    {
        $stockout = Historystock::with('user')->where('id', $stockout_id)->first();
        $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $stockout_id)->get();
        $company = Setting::latest()->first();

        set_time_limit(300);

        $pdf = PDF::loadView('stockout.pdf', ['stockout'=>$stockout, 'stockout_details'=> $stockout_details, 'company'=> $company]);

        $content = $pdf->download()->getOriginalContent();

        Storage::put('public/pdf/'.$stockout->user->user_name .'-'. str_pad($stockout->id,9,"0",STR_PAD_LEFT). '.pdf' ,$content) ;

        Toastr::success('PDF successfully saved', 'Success');
        return redirect()->back();

    }


}
