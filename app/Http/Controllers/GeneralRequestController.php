<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function show($id)
    {
        $stockout = GeneralRequest::with('user')->where('id', $id)->first();
        $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $id)->get();
        $user_leader_id = Historystock::with('user')->where('user_leader_id', $id)->get();

        $company = Setting::latest()->first();
        return view('stockout.stockout_confirmation', compact('stockout_details', 'stockout', 'company','user_leader_id'));
    }
    
    public function index()
    {
        $page_title = 'general request';
        return view('pages.generalrequest.general_request', compact('page_title'));
 
    }

        public function general_requestdatatables(){
            {
                // $users1 = Role::with('user');
               $users = Auth::user()->emp_id;
                $who_login = User::find(Auth::user()->id);
                //dd($who_login);
                //dd($who_login->getRoleNames()[0]);
                $data = DB::table('tran_general')
                
                ->select([   
                    
                    'tran_general.emp_id as emp_id',
                    'tran_general.gen_id as gen_id',
                    'tran_general.gen_ticket as gen_ticket',
                    'tran_general.gen_date_req as gen_date_req',
                    'tran_general.gen_status as gen_status',
                    'tbl_users.user_firstname',
                    'tbl_users.user_lastname',
                    'tbl_users.user_leader_id',

                ])        
                ->leftJoin('tbl_users', 'tran_general.emp_id', '=', 'tbl_users.emp_id');
                if($who_login->hasRole(['User', 'IT','Sekretaris'])){
                    $data->where('tran_general.emp_id', $users);
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
                        ->addColumn('action', function ($stockout) {
                     
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$stockout->gen_ticket.'" data-original-title="Edit"  class="btn-sm fa fa-bars editStockout"></a>'; 
                    // $button = '<a class="btn btn-sm btn-info" href="' . route('stockout.show', $stockout->id) . '" >Show <i class="fa fa-eye"></i></a>';
                    if (\Auth::user()->can('role-show-req-stationary')) {
                        $button = '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="' . route('stockout.show', $stockout->gen_ticket) . '" >Edit <i class="fa fa-edit"></i></a>';
                    }
                    elseif(\Auth::user()->can('users-delete')) {
                        $button = '&nbsp;&nbsp;&nbsp;<a id="' . $stockout->gen_ticket . '" class="delete btn btn-sm btn-danger" href="#" >Delete <i class="fa fa-trash"></i></a>';
                    }
                    
                    return $button;
                })
                ->rawColumns(['action'])
                        ->make(true);
                    }
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

