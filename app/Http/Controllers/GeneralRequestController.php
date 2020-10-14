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
    public function index(){    
             
        //Stationary
        $stationarys = Stationary::when(request('search'), function($query){
                        return $query->where('name_stat','like','%'.request('search').'%');
                    })
                    // ->orderBy('created_at','desc')
                    ->paginate(12);


        //cart item
        if(request()->tax){
            $tax = "+10%";
        }else{
            $tax = "0%";
        }

        $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'pajak',
                'type' => 'tax', //tipenya apa
                'target' => 'total', //target kondisi ini apply ke mana (total, subtotal)
                'value' => $tax, //contoh -12% or -10 or +10 etc
                'order' => 1
            ));                
            
        \Cart::session(Auth()->id())->condition($condition);          

        $items = \Cart::session(Auth()->id())->getContent();
        
        if(\Cart::isEmpty()){
            $cart_data = [];            
        }
        else{
            foreach($items as $row) {
                $cart[] = [
                    'id_item' => $row->id_item,
                    'name' => $row->name,
                    'qty' => $row->quantity,
                    'pricesingle' => $row->price,
                    'price' => $row->price,
                    // 'created_at' => $row->attributes['created_at'],
                ];           
            }
            
            $cart_data = collect($cart)->sortBy('created_at');

        }
        
        //total
        $sub_total = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();

        $new_condition = \Cart::session(Auth()->id())->getCondition('pajak');
        $pajak = $new_condition->getCalculatedValue($sub_total); 
        $stationary = DB::table('para_stationary')->pluck("name_stat","id_item");

        $data_total = [
            'sub_total' => $sub_total,
            'total' => $total,
            'tax' => $pajak
        ];
        return view('pages.generalrequest.create', compact('stationary', 'stationarys','cart_data','data_total'));
        // return view('pages.generalrequest.create',compact('stationary'));
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
        public function general_requestdatatables(){
        $data = GeneralRequest::query()
                ->select([
                    'tran_general.gen_id as gen_id',
                    'tran_general.gen_ticket as gen_ticket',
                    'tran_general.gen_date_req as gen_date_req',
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
    //     public function create()
    // {
    //     $stationary = DB::table('para_stationary')->pluck("name_stat","id_item");
    //     return view('pages.generalrequest.create',compact('stationary'));
    // }
    // public function create()
    // {
    //   $stationary = DB::table('para_stationary')->pluck("name_stat","id_item");
    //   return view('pages.generalrequest.create',compact('stationary'));
    // }
    public function addStationaryCart($id){
        $stationary = Stationary::find($id);      
                
        $cart = \Cart::session(Auth()->id())->getContent();        
        $cek_itemId = $cart->whereIn('id', $id);  
      
        if($cek_itemId->isNotEmpty()){
            if($stationary->qty == $cek_itemId[$id]->quantity){
                return redirect()->back()->with('error','jumlah item kurang');
            }else{
                \Cart::session(Auth()->id())->update($id, array(
                    'quantity' => 1
                ));
            }            
        }else{
             \Cart::session(Auth()->id())->add(array(
            'id' => $id,
            'name' => $stationary->name,
            'price' => $stationary->price,
            'quantity' => 1, 
            'attributes' => array(
                'created_at' => date('Y-m-d H:i:s')
            )          
        ));
        
        }       

        return redirect()->back();
    }

    public function removeStationaryCart($id){
        \Cart::session(Auth()->id())->remove($id);     
                         
        return redirect()->back();
    }

    public function bayar(){

        $cart_total = \Cart::session(Auth()->id())->getTotal();
        $bayar = request()->bayar;
        $kembalian = (int)$bayar - (int)$cart_total;
               
        if($kembalian >= 0){  
            DB::beginTransaction();

            try{

            $all_cart = \Cart::session(Auth()->id())->getContent();
           

            $filterCart = $all_cart->map(function($item){
                return [
                    'id' => $item->id,
                    'quantity' => $item->quantity
                ];
            });

            foreach($filterCart as $cart){
                $Stationary = Stationary::find($cart['id']);
                
                if($Stationary->qty == 0){
                    return redirect()->back()->with('errorTransaksi','jumlah pembayaran gak valid');  
                }

                HistoryStationary::create([
                    'Stationary_id' => $cart['id'],
                    'user_id' => Auth::id(),
                    'qty' => $Stationary->qty,
                    'qtyChange' => -$cart['quantity'],
                    'tipe' => 'decrease from transaction'
                ]);
                
                $Stationary->decrement('qty',$cart['quantity']);
            }
            
            $id = IdGenerator::generate(['table' => 'transcations', 'length' => 10, 'prefix' =>'INV-', 'field' => 'invoices_number']);

            Transcation::create([
                'invoices_number' => $id,
                'user_id' => Auth::id(),
                'pay' => request()->bayar,
                'total' => $cart_total
            ]);

            foreach($filterCart as $cart){    

                StationaryTranscation::create([
                    'Stationary_id' => $cart['id'],
                    'invoices_number' => $id,
                    'qty' => $cart['quantity'],
                ]);                
            }

            \Cart::session(Auth()->id())->clear();

            DB::commit();        
            return redirect()->back()->with('success','Transaksi Berhasil dilakukan Tahu Coding | Klik History untuk print');        
            }catch(\Exeception $e){
            DB::rollback();
                return redirect()->back()->with('errorTransaksi','jumlah pembayaran gak valid');        
            }        
        }
        return redirect()->back()->with('errorTransaksi','jumlah pembayaran gak valid');        

    }

    public function clear(){
        \Cart::session(Auth()->id())->clear();
        return redirect()->back();
    }

    public function decreasecart($id){
        $Stationary = Stationary::find($id);      
                
        $cart = \Cart::session(Auth()->id())->getContent();        
        $cek_itemId = $cart->whereIn('id', $id); 

        if($cek_itemId[$id]->quantity == 1){
            \Cart::session(Auth()->id())->remove($id);  
        }else{
            \Cart::session(Auth()->id())->update($id, array(
            'quantity' => array(
                'relative' => true,
                'value' => -1
            )));            
        }
        return redirect()->back();

    }


    public function increasecart($id){
        $Stationary = Stationary::find($id);     
        
        $cart = \Cart::session(Auth()->id())->getContent();        
        $cek_itemId = $cart->whereIn('id', $id); 

        if($Stationary->qty == $cek_itemId[$id]->quantity){
            return redirect()->back()->with('error','jumlah item kurang');
        }else{
            \Cart::session(Auth()->id())->update($id, array(
            'quantity' => array(
                'relative' => true,
                'value' => 1
            )));

            return redirect()->back();
        }        
    }

    public function history(){
        $history = Transcation::orderBy('created_at','desc')->paginate(10);
        return view('pos.history',compact('history'));
    }

    public function laporan($id){
        $transaksi = Transcation::with('stationaryTranscation')->find($id);
        return view('laporan.transaksi',compact('transaksi'));
    }

    
}
