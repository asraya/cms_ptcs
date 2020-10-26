<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice : Inventory Management System</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/font-awesome/css/font-awesome.min.css') }}">

    <!-- Theme style -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fa fa-globe"></i> {{ config('app.name') }}
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
                            <strong>Admin, {{ config('app.name') }}</strong><br>
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
                            <strong>{{ $stockout->user->user_name }}</strong><br>
                             Email: {{ $stockout->user->email }}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice #IMS-{{ $stockout->created_at->format('Ymd') }}{{ $stockout->id }}</b><br><br>
                        <b>Stockout ID:</b> {{ str_pad($stockout->id,9,"0",STR_PAD_LEFT) }}<br>
                        <b>stockout Status:</b> <span class="badge {{ $stockout->stockout_status == 'approved' ? 'badge-success' : 'badge-warning'  }}">{{ $stockout->stockout_status }}</span><br>
                        <b>Account:</b> {{ $stockout->user->user_id }}
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
                                    <td>{{ $stockout_detail->product->name }}</td>
                                    <td>{{ $stockout_detail->product->code }}</td>
                                    <td>{{ $stockout_detail->quantity }}</td>
                                    <td>{{ $unit_cost = $stockout_detail->unit_cost, 2 }}</td>
                                    <td>{{ $unit_cost * $stockout_detail->quantity, 2 }}</td>
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
                    <div class="col-4">
                        <div class="table-responsive">
                            <table class="table table-bordered">
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
                                    <td class="text-right">{{ $stockout->due,  }}</td>
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
                                    <td class="text-right">{{ $stockout->sub_total, 2 }}</td>
                                </tr>
                                <tr>
                                    <th>Tax (21%)</th>
                                    <td class="text-right">{{ $stockout->vat, 2 }}</td>
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
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

<!-- /.content -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('assets/backend/js/adminlte.js') }}"></script>

{{--<script type="text/php">--}}
{{--    if ( isset($pdf) ) {--}}
{{--        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'arial']);--}}
{{--        $pdf->page_text(300, 740, "Page: {PAGE_NUM} of {PAGE_COUNT}", 'arial', 6, array(0,0,0));--}}
{{--    }--}}
{{--</script>--}}

</body>



</html>




