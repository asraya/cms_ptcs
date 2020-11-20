<?php

namespace App\Http\Controllers;
use App\tbl_users;

use App\User;
use App\Historystock;
use App\HistorystockDetail;
use App\Stationary;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Stationary::get();
        $users = User::all();
        $cart_products = Cart::content();


        
        return view('add_genreq.index', compact('products', 'users', 'cart_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function edit($id)
    {
        $user = HistorystockDetail::find($id);
        $userss = User::all();
        $cart_products = Cart::content();

        
        


        return view('add_genreq.edit',compact('user', 'userss', 'cart_products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function update(Request $request, $id)
    {
        $this->validate($request, [
    
            'quantity' => 'required',
        ]);

        $role = HistorystockDetail::find($id);
        $role->quantity = $request->input('quantity');
        Cart::edit($rowId, $qty);

        $role->save();      

        return redirect()->route('req.index')
        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




}
