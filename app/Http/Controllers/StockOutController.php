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
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
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
        $user_leader_id = Historystock::with('user')->where('user_leader_id', $id)->get();

        $company = Setting::latest()->first();
        return view('stockout.stockout_confirmation', compact('stockout_details', 'stockout', 'company','user_leader_id'));
    }
    
    public function index()
    {
          $page_title = 'test';
        return view('stockout.pending_stockouts', compact('page_title'));
    }

    public function pending_stockout()
    {
        // $users1 = Role::with('user');
       $users = Auth::user()->emp_id;
        $who_login = User::find(Auth::user()->id);
        //dd($who_login);
        //dd($who_login->getRoleNames()[0]);
        
        $data = DB::table('historystocks')
        
        ->select([   

            'historystocks.id as id',
            'historystocks.emp_id as emp_id',
            'historystocks.stockout_status as stockout_status',
            'tbl_users.user_firstname',
            'tbl_users.user_lastname',
            'tbl_users.user_leader_id',

        ])        
        ->leftJoin('tbl_users', 'historystocks.emp_id', '=', 'tbl_users.emp_id');
        if($who_login->hasRole(['User', 'IT','Sekretaris'])){
            $data->where('historystocks.emp_id', $users);
        }elseif($who_login->hasRole(['HRD'])){
            
        }
        if (request('stockout_status')) {
            $stockout_status = now()->subDays(request('stockout_status'))->toDateString();
            $data->where('gen_date_req', '>=', $stockout_status);
        }
        // if($filter_status){
        //     $data->where('status', $status);
        // }
        $data->get();

        return DataTables::of($data)    
        ->addColumn('employee_name', function($data){
                    return $data->user_firstname . " " . $data->user_lastname;
                })
                ->addColumn('action', function ($stockout) {
             
            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$stockout->id.'" data-original-title="Edit"  class="btn-sm fa fa-bars editStockout"></a>'; 
            // $button = '<a class="btn btn-sm btn-info" href="' . route('stockout.show', $stockout->id) . '" >Show <i class="fa fa-eye"></i></a>';
            if (\Auth::user()->can('role-show-req-stationary')) {
                $button = '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="' . route('stockout.show', $stockout->id) . '" >Edit <i class="fa fa-edit"></i></a>';
            }
            elseif(\Auth::user()->can('users-delete')) {
                $button = '&nbsp;&nbsp;&nbsp;<a id="' . $stockout->id . '" class="delete btn btn-sm btn-danger" href="#" >Delete <i class="fa fa-trash"></i></a>';
            }
            
            return $button;
        })
        ->rawColumns(['action'])
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
        public function stockout_print($id)
        {
            $stockout = Historystock::with('user')->where('id', $id)->first();
            //return $stockout;
            $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $id)->get();
            //return $stockout_details;
            $company = Setting::latest()->first();
            return view('stockout.print', compact('stockout_details', 'stockout', 'company'));
        }
        public function edit($id)
        {
            $stockout = Historystock::find($id);      
            $stockout->save();
            return response()->json($stockout);
            
        }
    public function approved_stockout()
    {
        $approveds = Historystock::latest()->with('user')->where('stockout_status', 'approved')->get();
        return view('stockout.approved_stockouts', compact('approveds'));
    }

    public function update(Request $request, $rowId)
    {
        $qty = $request->input('qty');
        Cart::update($rowId, $qty);

        Toastr::success('List Updated Successfully', 'Success');
        return redirect('/pegawai');
    }

    public function stockout_confirm_mgr($id)
    {
        $stockout = Historystock::findOrFail($id);
        $stockout->user_leader_id = Historystock::with('user')->where('user_leader_id', $id)->get();
        $stockout->stockout_status = 'Approved Manajer Div';

        $stockout_details = HistorystockDetail::with('user')->where('stockout_id', $id)->get();        
        $stockout->save();  
        Toastr::success('stockout has been PROCESS!', 'Success');
        return redirect()->back();
    }
    

    public function stockout_confirm_ga($id)
    {
        $stockout = Historystock::findOrFail($id);
        $stockout->stockout_status = 'WAITING PROCESS ADMIN';
        $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $id)->get();        
        $stockout->save();  
        Toastr::success('stockout has been PROCESS!', 'Success');
        return redirect()->back();
    }
    

    public function stockout_confirm($id)
{

        $stockout = Historystock::findOrFail($id);
        //dd($stockout);
        $stockout->stockout_status = 'approved';
        // Stationary::where(['id'=>1])->decrement('stock_item', $id);
        $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $id)->get();
        
        $stockout->save();   

        DB::enableQueryLog();
        foreach($stockout_details as $details){
 
            //dd($details->product_id);
            $stockout_item = Stationary::findOrFail(1);
            $stockout_item = Stationary::where('id', $details->product_id);
            $stockout_item->decrement('stock_item', $details->quantity);
        }
        // dd(DB::getQueryLog());  
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
