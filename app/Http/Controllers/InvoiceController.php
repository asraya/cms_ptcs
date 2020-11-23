<?php

namespace App\Http\Controllers;

use App\User;
use App\Historystock;
use App\HistorystockDetail;
use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class InvoiceController extends Controller
{
    public function create(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'user_id' => 'required | integer',
          'email'  =>  'required|email',
          'user_name'  =>  'required',
          'user_leader_id'  =>  'required',


        ];
        $customMessages = [
            'user_id.required' => 'Select a User first!.',
            'user_id.integer' => 'Invalid User!.',
            'email' => 'Invalid email!.',
            'user_name' => 'Invalid user!.',
            'user_leader_id' => 'Invalid user_leader_id!.',

        ];
        Mail::to('asep.rayana@ymail.com')->send(new SendMail($inputs, $rules, $customMessages));
        $validator = Validator::make($inputs, $rules, $customMessages);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = $request->input('user_id');
        $user = User::findOrFail($user_id);
        $users = User::all();
        $contents = Cart::content();
        $company = Setting::latest()->first();
        return view('invoice', compact('user', 'contents', 'company','users'));
    }

    public function print($user_id)
    {
        $user = User::findOrFail($user_id);
        $contents = Cart::content();
        $company = Setting::latest()->first();
        return view('print', compact('user', 'contents', 'company'));
    }

    public function stockout_print($stockout_id)
    {
        $stockout = Historystock::with('user')->where('id', $stockout_id)->first();
        //return $stockout;
        $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $stockout_id)->get();
        //return $stockout_details;
        $company = Setting::latest()->first();
        return view('stockout.print', compact('stockout_details', 'stockout', 'company'));
    }
    public function show($id)
    {
        $stockout = Historystock::with('user')->where('id', $id)->first();
        $stockout_details = HistorystockDetail::with('product')->where('stockout_id', $id)->get();
        $company = Setting::latest()->first();
      
    }

    public function final_invoice(Request $request)
    {
        $inputs = $request->except('_token');

        $rules = [
            
          'payment_status' => 'required',
          'user_id' => 'required | integer',
          'emp_id' => 'required',

        ];
        $customMessages = [
            'payment_status.required' => 'Select a Payment method first!.',
            'emp_id.required' => 'Select a Payment method first!.',
            'user_leader_id.required' => 'Select a Payment method first!.',

        ];
        // dd($rules);
        $validator = Validator::make($inputs, $rules, $customMessages);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sub_total = str_replace(',', '', Cart::subtotal());
        $tax = str_replace(',', '', Cart::tax());
        $total = str_replace(',', '', Cart::total());

        $pay = $request->input('pay');

        $stockout = new Historystock();
        $stockout->user_id = $request->input('user_id');
        $stockout->emp_id = $request->input('emp_id');
        $stockout->user_leader_id = $request->input('user_leader_id');
        $stockout->so_number = $request->input('so_number');

        $stockout->payment_status = $request->input('payment_status');
        $stockout->pay = $pay;
        $stockout->stockout_date = date('Y-m-d');
        $stockout->stockout_status = 'pending';
        $stockout->total_products = Cart::count();
        $stockout->sub_total = $sub_total;
        $stockout->vat = $tax;
        $stockout->total = $total;
        $stockout->save();

        $stockout_id = $stockout->id;
        $contents = Cart::content();

        foreach ($contents as $content)
        {
            $stockout_detail = new HistorystockDetail();
            $stockout_detail->stockout_id = $stockout_id;
            $stockout_detail->product_id = $content->id;
            $stockout_detail->quantity = $content->qty;
            $stockout_detail->unit_cost = $content->price;
            $stockout_detail->total = $content->total;
            $stockout_detail->user_leader_id = $content->user_leader_id;

            $stockout_detail->save();
        }

        Cart::destroy();

        Toastr::success('Invoice created successfully', 'Success');
        return redirect()->route('stockout.pending');


    }



}
