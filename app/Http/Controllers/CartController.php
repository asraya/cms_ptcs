<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'id' => 'required | integer',
          'name' => 'required',
          'qty' => 'required',
          'price' => 'required',
        ];
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->input('id');
        $name = $request->input('name');
        $qty = $request->input('qty');
        $price = $request->input('price');

        $add = Cart::add(['id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'weight' => 1 ]);
        if ($add)
        {
            Toastr::success('Product successfully added to list', 'Success');
            return redirect()->back();

        } else {

            Toastr::error('Product not added to cart', 'Error');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $rowId)
    {
        $qty = $request->input('qty');
        Cart::update($rowId, $qty);

        Toastr::success('List Updated Successfully', 'Success');
        return redirect()->back();
    }

   
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        Toastr::success('Product Successfully', 'Success');
        return redirect()->back();
    }
}
