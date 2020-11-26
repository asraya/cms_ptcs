@extends('layout.default')

@section('title', 'Invoice')

@push('css')
    <style>
        .modal-lg {
            max-width: 50% !important;
        }
    </style>
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice</h1>
                    </div>
                   
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fa fa-globe"></i> PT. Control Systems Arena Para
                                        <small class="float-right">Date: {{ date('l, d-M-Y h:i:s A') }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>{{ $user->user_name }}</strong><br>
                                        {{ $user->user_id }}<br>
                                        {{ $user->emp_id }}<br>
                                        
                                        Email: {{ $user->email }}
                                    </address>
                                   
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>Admin</strong><br>
                                        {{ $company->address }}<br>
                                        {{ $company->city }} - {{ $company->zip_code }}, {{ $company->country }}<br>
                                        Phone: (+880) {{ $company->mobile }} {{ $company->phone !== null ? ', +88'.$company->phone : ''  }}<br>
                                        Email: {{ $company->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Payment Due:</b> {{ Cart::total() }}<br>
                                    <b>Stockout Status:</b> <span class="badge badge-warning">Pending</span><br>
                                    <b>leader :</b> {{ $user->user_leader_id }}<br>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Subtotal</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contents as $content)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $content->name }}</td>

                                                    <td>{{ $content->qty }}</td>
                                                    
                                                    <td>{{ $content->price, 2 }}</td>
                                                    <td>{{ $content->subtotal() }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-8"></div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td class="text-right">{{ Cart::subtotal() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (0%)</th>
                                                <td class="text-right">{{ Cart::tax() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td class="text-right">{{ Cart::total() }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="{{ route('invoice.print_souvenir', $user->id) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                    <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success float-right"><i class="fa fa-credit-card"></i>
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--payment modal -->
    <form action="{{ route('invoice.final_invoicesouvenir') }}" method="post">
        @csrf
        <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Invoice of {{ $user->user_name }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- <div class="col-12">
                                <p class="text-info float-right mb-3">Total : {{ Cart::total() }}</p>
                            </div> -->
                        </div>
                        <div class="form-group col-md-6">
                                <input type="hidden" value="{{ Cart::total() }}"name="pay" class="form-control form-control-solid form-control-lg" readonly >
                            </div>
                            
                        <div class="form-row">
                            <input type="hidden" name="gen_company" value="-" class="form-control form-control-solid form-control-lg">
                            <input type="hidden" name="gen_id" value="<?php echo Str::random(10);?>" class="form-control form-control-solid form-control-lg">
                            <input type="hidden" name="gen_status" value="1" class="form-control form-control-solid form-control-lg">
                            <input type="hidden" name="gen_mgr_app" value="n/a" class="form-control form-control-solid form-control-lg">
                            <input type="hidden" name="gen_purpose" value="1" class="form-control form-control-solid form-control-lg">
                            <input type="hidden" name="gen_subject" value="-" class="form-control form-control-solid form-control-lg" readonly >
                      
                        <div class="form-group col-md-6">
                                <label for="inputConfirm">Purpose</label>
    <select id="selectBox" onchange="changeFunc();">
<option value="PurposeType">Purpose Type:</option>
<option value="Training">Training</option>
<option value="Project">Project</option>
</select>
    </div> 
<div class="form-group col-md-6">
<label style="display: none" id="textboxes7">Project Name</label>
<input class="form-control form-control-lg" name="nameproj" value="-" placeholder="Project Name" type="text" style="display: none" id="pro">
</div>
<div class="form-group col-md-6">
<label style="display: none" id="textboxes3">So number</label>
<input class="form-control form-control-lg" name="gen_sonumber" value="-" placeholder="SO Number" type="text" style="display: none" id="gen_sonumber">
</div>
<div class="form-group col-md-6">
<label style="display: none" id="textboxes4">Participants Tranning</label>
<input type="text" class="form-control form-control-lg" name="gen_participant" value="0" placeholder="Participants Tranning" type="text" style="display: none" id="user_leader_id">
</div>
<div class="form-group col-md-6">
<label style="display: none" id="textboxes5">Company Name</label>
<input type="text" class="form-control form-control-lg" name="gen_company" value="-" placeholder="Company Name" type="text" style="display: none" id="com">
</div>
<div class="form-group col-md-6">
<label type="text" style="display: none" id="textboxes6">Training Subject</label>
<input type="text" class="form-control form-control-lg" name="gen_subject" value="-"  placeholder="Training Subject" type="text" style="display: none" id="sub">
</div>                
<input type="text" name="gen_ticket" value="<?php echo $genreq->gen_ticket ?? '';?>" class="form-control form-control-solid form-control-lg">
                            <div class="form-group col-md-6">
                                <label for="inputemp_id">Employee Id</label>
                                    <input type="text" name="emp_id" 
                                            class="form-control form-control-solid form-control-lg" 
                                            value="{{ Auth::user()->emp_id }}" readonly/>
                            </div> 
                            <div class="form-group col-md-6">
<label style="display: none" id="textboxes4">Manager Approver</label>
                            <select class="form-control form-control-lg" name="user_leader_id" placeholder="Manager Approver" type="text" style="display: none" id="user_leader_id">
                                @foreach($users as $stockout)
                                    <option name="user_leader_id" id="user_leader_id" value="{{ Auth::user()->user_leader_id }}">{{ $stockout->user_leader_id}}</option>
                                @endforeach 
                            </select>

                            </div>
                                                
                            <div class="form-group col-md-6">
                            <label class="col-form-label col-lg-3 col-sm-10">Note</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                            <textarea id="gen_notes" value="-" class="form-control" name="gen_notes">
                            </textarea>
                            </div>   
                        </div>                        
                    </div>
                    <input type="hidden" name="user_id" value="{{ $content->qty }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--/.payment modal -->



@endsection



@push('js')

@endpush
<script type="text/javascript">
function changeFunc() {
var selectBox = document.getElementById("selectBox");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
if (selectedValue=="Training"){
$('#user_leader_id').show();
$('#com').show();
$('#sub').show();
$('#textboxes4').show();
$('#textboxes5').show();
$('#textboxes6').show();

$('#gen_sonumber').hide();
$('#pro').hide();

$('#textboxes3').hide();
$('#textboxes7').hide();

}
if (selectedValue=="Project"){
$('#gen_sonumber').show();
$('#pro').show();

$('#user_leader_id').show();
$('#com').hide();
$('#sub').hide();
$('#textboxes6').hide();
$('#textboxes5').hide();
$('#textboxes4').show();
$('#textboxes3').show();
$('#textboxes7').show();

}

}
</script>