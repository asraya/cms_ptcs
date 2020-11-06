@extends('layout.default')

@section('title', 'Add')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <div class="card">
                            <form action="{{ route('invoice.create') }}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h3 class="card-title">
                                    CREATE GENERAL REQUEST
                                        <span>
                                            <button type="submit" class="btn btn-sm btn-danger float-md-right ml-3">Create Invoice</button>
                                        </span>
                                    </h3>

                                </div>
                                
                                <div class="card-body">
<div class="row">
 <div class="col-xl-12">                               
 <div class="form-group row">
 <!-- <label class="col-form-label col-lg-3 col-sm-10">User ID</label> -->
<!-- <div class=" col-lg-9 col-md-9 col-sm-12"> -->
<input type="hidden" name="user_id"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->id }}" readonly/>
<!-- </div> -->
    </div>
    <div class="form-group row">
 <label class="col-form-label col-lg-3 col-sm-10">Email</label>
<div class=" col-lg-9 col-md-9 col-sm-12">
<input type="text" name="email"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->email }}" readonly/>
</div>
    </div>
    <div class="form-group row">
 <label class="col-form-label col-lg-3 col-sm-10">User</label> 
<div class=" col-lg-9 col-md-9 col-sm-12">
<input type="text" name="user_name"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->user_name }}" readonly/>
</div>
    </div>
    <div class="form-group row">
 <label class="col-form-label col-lg-3 col-sm-10">Employee ID</label>
<div class=" col-lg-9 col-md-9 col-sm-12">
<input type="text" name="emp_id"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->emp_id }}" readonly/>
</div>
    </div>
    <div class="form-group row">
 <label class="col-form-label col-lg-3 col-sm-10">Note</label>
<div class=" col-lg-9 col-md-9 col-sm-12">
<textarea id="note" class="form-control" name="note">
</textarea>
</div>    
    </div>
        </div> 
           </div>     
                </div>
                    </form>
                        </div>
                        <div class="card card-default">
                            <!-- <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-info"></i>
                                    Add Lists

                                </h3>
                            </div> -->
                            <!-- /.card-header -->
                            <div class="card-body">
                            Add Lists
                                @if($cart_products->count() < 1)
                                    <div class="alert alert-danger">
                                        No Product Added
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped text-center mb-3">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th width="17%">Qty</th>
                                            <th>Price</th>
                                            <th>Sub Total</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cart_products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-left">{{ $product->name }}</td>
                                                <form action="{{ route('cart.update', $product->rowId) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <td>
                                                        <input type="number" name="qty" class="form-control" value="{{ $product->qty }}">
                                                    </td>
                                                    <td>{{ $price = $product->price, 2 }}</td>
                                                    <td>{{ $price * $product->qty }}</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </form>
                                                <td>
                                                    <button class="btn btn-danger" type="button" onclick="deleteItem({{ $product->id }})">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $product->id }}" action="{{ route('cart.destroy', $product->rowId) }}" method="post"
                                                          style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif

                                <div class="alert alert-danger">
                                    <p>Quantity : {{ Cart::count() }}</p>
                                    <p>Sub Total : {{ Cart::subtotal() }}</p>
                                </div>
                                <div class="alert alert-primary">
                                    Total : {{ Cart::total() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Item Stationary</h3>
                                
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Add</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Add</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <!-- <select name="name_stat">
    @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name_stat}}</option>
    @endforeach 
</select> -->
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <form action="{{ route('cart.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name_stat }}">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price" value="{{ $product->price_stat }}">

                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name_stat }}</td>                                                
                                                <td>{{ $product->price_stat, 2 }}</td>
                                                <td>
                                                    <button type="submit" class="btn btn-sm btn-danger   px-2">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div> <!-- Content Wrapper end -->
@endsection




@push('js')

    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/backend/plugins/fastclick/fastclick.js') }}"></script>

    <!-- Sweet Alert Js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>


    <script>
    
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>


    <script type="text/javascript">
        function deleteItem(id) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>



@endpush