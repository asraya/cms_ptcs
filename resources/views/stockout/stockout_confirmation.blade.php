@extends('layout.default')

@section('title', 'stockout')

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
                        <h1>Status Details</h1>
                    </div>
                    <div class="col-sm-6">
                      
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
                                        <i class="fa fa-globe"></i> PT Control Systems Arena Para Nusa
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
                                        <strong>Admin</strong><br>
                                        {{ $company->address }}<br>
                                        {{ $company->city }} - {{ $company->zip_code }}, {{ $company->country }}<br>
                                        Phone: (+880) {{ $company->mobile }} {{ $company->phone !== null ? ', +880'.$company->phone : ''  }}<br>
                                        Email: {{ $company->email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{ $stockout->user['user_name'] }}</strong><br>                                      
                                        Email: {{ $stockout->user['email'] }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #IMS-{{ $stockout->gen_date_req->format('Ymd') }}{{ $stockout->id }}</b><br><br>
                                    <!-- <b>stockout ID:</b> {{ str_pad($stockout->id,9,"0",STR_PAD_LEFT) }}<br> -->
                                    <b>stockout Status:</b> <span class="badge {{ $stockout->stockout_status == 'approved' ? 'badge-success' : 'badge-warning'  }}">{{ $stockout->stockout_status }}</span><br>
                                    <b>approve leader</b> <span class="badge {{ $stockout->stockout_status == 'approved' ? 'badge-success' : 'badge-warning'  }}">{{ $stockout->user_leader_id }}</span><br>

                                    <b>Account:</b> {{ $stockout->user['id'] }}
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
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($stockout_details as $stockout_detail)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td>{{ $stockout_detail->product['name_stat'] }}</td>
                                                    <td>{{ $stockout_detail->product['id'] }}</td>
                                                    <!-- <td>{{ $stockout_detail->quantity }}</td> -->
                                                    <td><input type="number" name="quantity" class="form-control" value="{{ $stockout_detail->quantity }}"><td>

                                                    <td>{{ $unit_cost = $stockout_detail->unit_cost, 2}}</td>
                                                    <td>{{ $unit_cost * $stockout_detail->quantity, 2}}</td>

                                                    <form action="{{ route('stockout.update', $stockout_detail->rowId) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <td>
                                                    </td>
                                                 
                                                    <td>
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </form>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-4">
                                    <div class="table-responsive">
                                        <table class="table table-bstockouted">
                                            <tr>
                                                <th style="width:50%">Method:</th>
                                                <td class="text-right">{{ $stockout->payment_status }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pay</th>
                                                <td class="text-right">{{ $stockout->pay, 2 }}</td>
                                            </tr>
                                            <tr>
                                                <th>Due</th>
                                                <td class="text-right">{{ $stockout->due, 2 }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4 offset-4">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td class="text-right">{{ number_format($stockout->sub_total, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (0%)</th>
                                                <td class="text-right">{{ number_format($stockout->vat, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td class="text-right">{{ round($stockout->total) }}</td>
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
                                    @if($stockout->stockout_status === 'WAITING PROCESS ADMIN')
                                        <a href="{{ route('invoice.stockout_print', $stockout->id) }}" target="_blank" class="btn btn-default">
                                            <i class="fa fa-print"></i> Print
                                        </a>
                                    @endif
                                    @if($stockout->stockout_status === 'pending')
                                        <a href="{{ route('req.edit', $stockout->id) }}" target="_blank" class="btn btn-default">
                                            <i class="fa fa-pencil"></i> edit
                                        </a>
                                    @endif
                                    @can('role-approved')
                                    @if($stockout->stockout_status === 'pending')
                                        <a href="{{ route('stockout.confirm', $stockout->id) }}" class="btn btn-success float-right">
                                            <i class="fa fa-credit-card"></i>
                                            Approved
                                        </a>
                                    @endcan
                                    @endif
                                    @can('role-approved')
                                    @if($stockout->stockout_status === 'Approved Manajer Div')
                                        <a href="{{ route('stockout.confirm', $stockout->id) }}" class="btn btn-success float-right">
                                            <i class="fa fa-credit-card"></i>
                                            Approved Admin
                                        </a>
                                    @endcan
                                    @endif
                                    @can('role-approved-mgr')
                                    @if($stockout->user_leader_id === Auth::user()->emp_id )
                                        <a href="{{ route('stockout.confirmMgr', $stockout->id) }}" class="btn btn-success float-right">
                                            <i class="fa fa-credit-card"></i>
                                            PROCESS Manager
                                        </a>
                                    @endcan
                                    @endif

                                    @can('role-approved-ga')
                                    @if($stockout->stockout_status === 'approved')
                                        <a href="{{ route('stockout.confirmGa', $stockout->id) }}" class="btn btn-success float-right">
                                            <i class="fa fa-credit-card"></i>
                                            PROCESS
                                        </a>
                                    @endcan
                                    @endif

                                    @if($stockout->stockout_status === 'WAITING PROCESS ADMIN')
                                        <a href="{{ route('stockout.download', $stockout->id) }}" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                                            <i class="fa fa-download"></i> Generate PDF
                                        </a>
                                    @endif
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





@endsection



@push('js')

@endpush