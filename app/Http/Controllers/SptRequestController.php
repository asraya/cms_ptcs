<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spt;
use DataTables;
use Validator,Redirect,Response;

class SptRequestController extends Controller
{
    // public function index()
    // {
    //     return view('pages/spt/spt_request');
    // }
    public function datatables()
    {        
        return datatables ( Spt::all())
        ->addIndexColumn()
                ->addColumn('action', function($data){
                       
                       $editUrl = url('edit/'.$data->id);
                       $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="btn-sm fa fa-bars"></a>';
                    //    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
    
                        return $btn;
                        
                })
     ->rawColumns(['action'])
     ->make(true);
    }
    // public function add_spt()
    // {
    //     return view('pages/spt/spt_request');

    // }   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);
        $show = User::create($validatedData);   
        return redirect('/user')->with('success', 'User Case is successfully saved');
    }

    public function edit(Request $request, $id)
    {       
        $data['spt'] = Spt::where('spt_id', $id)->first();
        $spt = $data['spt'];
        if(!$data['spt']){
           return redirect('/list');
        }
        $page_title = 'Edit data';
        $page_description = '--';
        return view('pages/spt/edit', compact('spt', 'page_title', 'page_description'));
    }

    public function update(Request $request)
    {
        $data = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        ]);
       
        if(!$request->id){
           return redirect('/list');
        }
        $check = user::where('id', $request->id)->update($data);
        return Redirect::to("datatables")->withSuccess('Great! User has been updated');
    }

    public function delete(Request $request, $id)
    {
        $check = User::where('id', $id)->delete(); 
        return Response::json($check);
    }
 
}