<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spt;
use DataTables;
use Validator,Redirect,Response;
use App\User;
use auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SptRequestController extends Controller
{
    public function index()
    {
          $page_title = 'test';
        return view('pages.spt.spt_request', compact('page_title'));
    }

    public function datatables()
    {        
        $users = Auth::user()->emp_id;
        $who_login = User::find(Auth::user()->id);

        $data = Spt::query()
        ->select([
          
            'tran_spt.emp_id as emp_id',
            'tran_spt.spt_no as spt_no',
            'tran_spt.purpose as purpose',
            'tran_spt.status as status',
            'tbl_users.user_firstname',
            'tbl_users.user_lastname'
        ])      
        ->leftJoin('tbl_users', 'tran_spt.emp_id', '=', 'tbl_users.emp_id');
        if($who_login->hasRole(['User', 'Sekretaris'])){
            $data->where('tran_spt.emp_id', $users);
            // ->orwhere('id', '1', $users1);
        }elseif($who_login->hasRole(['GA', 'HRD'])){
            
        }        
        return Datatables::of($data)
                ->addColumn('employee_name', function($data){
                    return $data->user_firstname . " " . $data->user_lastname;
                })
                ->addIndexColumn()                
                ->addColumn('action', function($data){
                    $btn='';

                    if ($data->status=="needApproval") {
                        # code...
                        $btn.= 'Waiting for confirmation';
        
                    } elseif ($data->status=="Rejected") {
                        
                        $btn.= 'Your Item Rejected';
        
                    } else {
                       $editUrl = url('edit/'.$data->id);
                       $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="btn-sm fa fa-bars"></a>';
                    //    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->user_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTodo">Delete</a>';
                    }
                        return $btn;
                        
                })
     ->rawColumns(['action'])
     ->make(true);
}    
               

                    public function show($id)
                    {
                        $spt = Spt::with('user')->where('id', $id)->first();
                        return view('pages.spt.spt_request', compact('spt'));
                    }
                    
        public function send(Request $request)
        {
            $request->validate([
                'spt_no' => 'required',
                'requester_id' => 'required',
                'emp_id' => 'required',
                'position' => 'required',
                'destination' => 'required',
                'purpose' => 'required',
                'spt_start' => 'required',
                'spt_end' => 'required',

            ]);
            $contact = new Spt([
                'spt_no' => $request->get('spt_no'),
                'requester_id' => $request->get('requester_id'),
                'emp_id' => $request->get('emp_id'),
                'position' => $request->get('position'),
                'destination' => $request->get('destination'),
                'purpose' => $request->get('purpose'),
                'spt_start' => $request->get('spt_start'),
                'spt_end' => $request->get('spt_end'),
                'status' => $request->get('status'),


            ]);
            Mail::to('asep.rayana@ymail.com')->send(new SendMail($contact));
            $contact->save();
            return redirect('/spt_request')->with('success', 'Spt saved!');

        }
        // public function send(Request $request)
        // {
        //     $inputs = $request->except('_token');
        //     $rules = [
        //         'spt_id' => 'required',
        //         'spt_no' => 'required',
        //         'requester_id' => 'required',
        //         'emp_id' => 'required',
        //         'position' => 'required',
        //         'destination' => 'required',
        //         'purpose' => 'required',
        //         'spt_start' => 'required',
        //         'spt_end' => 'required',
    
        //     ];
        //     $customMessages = [
        //         'spt_id' => 'required',
        //         'spt_no' => 'required',
        //         'requester_id' => 'required',
        //         'emp_id' => 'required',
        //         'position' => 'required',
        //         'destination' => 'required',
        //         'purpose' => 'required',
        //         'spt_start' => 'required',
        //         'spt_end' => 'required',
    
        //     ];
        //     Mail::to('asep.rayana@ymail.com')->send(new SendMail($inputs, $rules, $customMessages));
        //     $validator = Validator::make($inputs, $rules, $customMessages);
        //     if ($validator->fails())
        //     {
        //         return redirect()->back()->withErrors($validator)->withInput();
        //     }
    
        //     return back()->with('success', 'Thanks for contacting us!');

        // }

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