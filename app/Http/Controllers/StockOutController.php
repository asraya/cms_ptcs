<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Historystock;
use App\HistorystockDetail;
use App\Setting;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StockOutController extends Controller
{

    public function show($id)
    {
        $stockout = Historystock::with('user')->where('id', $id)->first();
        //return $stockout;
        $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $id)->get();
        //return $stockout_details;
        $company = Setting::latest()->first();
        return view('stockout.stockout_confirmation', compact('stockout_details', 'stockout', 'company'));
    }


    public function pending_stockout()
    {
        $pendings = Historystock::latest()->with('user')->where('stockout_status', 'pending')->get();
        return view('stockout.pending_stockouts', compact('pendings'));
    }

    public function approved_stockout()
    {
        $approveds = Historystock::latest()->with('user')->where('stockout_status', 'approved')->get();
        return view('stockout.approved_stockouts', compact('approveds'));
    }

    public function stockout_confirm($id)
    {
        $stockout = Historystock::findOrFail($id);
        $stockout->stockout_status = 'approved';
        $stockout->save();

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
        //return $stockout;
        $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $stockout_id)->get();
        //return $stockout_details;
        $company = Setting::latest()->first();

        set_time_limit(300);

        $pdf = PDF::loadView('stockout.pdf', ['stockout'=>$stockout, 'stockout_details'=> $stockout_details, 'company'=> $company]);

        $content = $pdf->download()->getOriginalContent();

        Storage::put('public/pdf/'.$stockout->user->user_name .'-'. str_pad($stockout->id,9,"0",STR_PAD_LEFT). '.pdf' ,$content) ;

        Toastr::success('PDF successfully saved', 'Success');
        return redirect()->back();

    }


}
