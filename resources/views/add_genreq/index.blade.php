@extends('layout.default')

@section('title', 'Add')

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
<div class="col-lg-9 col-md-9 col-sm-12">
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
<div class="col-lg-9 col-md-9 col-sm-12">
<input type="text" name="emp_id" class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->emp_id }}" readonly/>
</div>
    </div>
    <!-- <div class="form-group row">
 <label class="col-form-label col-lg-3 col-sm-10">Lead ID</label>
<div class="col-lg-9 col-md-9 col-sm-12">
<input type="text" name="user_leader_id" class="form-control form-control-solid form-control-lg" value="" />
</div> -->
    <!-- </div>
    <div class="form-group row">
 <label class="col-form-label col-lg-3 col-sm-10">Note</label>
<div class="col-lg-9 col-md-9 col-sm-12">
<textarea id="note" class="form-control" name="note">
</textarea>
</div>     -->
    <!-- <div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-10">Purpose</label>
    <select class="col-lg-9 col-md-9 col-sm-12" id="selectBox" onchange="changeFunc();">
<option value="PurposeType">Purpose Type:</option>
<option value="Office">Office</option>
<option value="Project">Project</option>
</select>
    </div>  -->
        </div>
        </div>


<div class="form-group row">
<div class="col-lg-9 col-md-9 col-sm-12">
<input class="form-control form-control-lg" name="dd_number3" placeholder="SO Number" type="text" style="display: none" id="textboxes3">

</div>
</div>
<div class="form-group row">
<div class="col-lg-9 col-md-9 col-sm-12">


<!-- <input class="form-control form-control-lg" value="{{ Auth::user()->user_leader_id }}" name="user_leader_id" type="text" style="display: none" id="textboxes2" readonly> -->

 <select class="form-control form-control-lg" name="user_leader_id" placeholder="Manager Approver" type="text" style="display: none" id="textboxes2">
    @foreach($users as $stockout)
        <option name="user_leader_id" value="{{ Auth::user()->user_leader_id }}">{{ $stockout->user_leader_id}}</option>
    @endforeach 
</select>

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
                            Add Lists Stationary
                                @if($cart_products->count() < 1)
                                    <div class="alert alert-danger">
                                        No Product Added
                                    </div>
                                @else
                                
                                    <table id="example2" class="table table-bordered table-striped text-center mb-3">
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

                                <!-- <div class="alert alert-danger">
                                    <p>Quantity : {{ Cart::count() }}</p>
                                    <p>Sub Total : {{ Cart::subtotal() }}</p>
                                </div>
                                <div class="alert alert-primary">
                                    Total : {{ Cart::total() }}
                                    
                                </div> -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                      <!-- <select name="name_stat">
    @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name_stat}}</option>
    @endforeach 
</select> -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Item Stationary</h3> 
                                 <!-- <select name="name_stat">
    @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name_stat}}</option>
    @endforeach 
</select> -->
                                <a href="/add_genreq2" class="btn btn-danger font-weight-bolder">
                  <span class="svg-icon svg-icon-md">
                     <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                     <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Request Souvenir</a>
            </div>                               


                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Unit</th>
                                        <th>stock</th>
                                        <th>limit</th>

                                        <th>Add</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Unit</th>
                                        <th>stock</th>
                                        <th>limit</th>

                                        <th>Add</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                  
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
                                                <td>{{ $product->unit_stat }}</td>
                                                <td>{{ $product->stock_item }}</td>
                                                <td>{{ $product->limit_stat }}</td>

                                                <td>
                                                @if($product->stock_item == 0)

                                                <img class="card-img-top gambar" src="{{ $product->image }}">
                                        <button class="btn btn-primary btn-sm cart-btn disabled" style="display: none"><i
                                                class="fas fa-plus"></i></button>

                                                    @else
                                                    <img class="card-img-top gambar" src="{{ $product->image }}"
                                            style="cursor: pointer"
                                            onclick="this.closest('form').submit();return false;">
                                        <button type="submit" class="btn btn-primary btn-sm cart-btn"><i
                                                class="fas fa-plus"></i></button>


                                                    @endif

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
  

<script type="text/javascript">
function changeFunc() {
var selectBox = document.getElementById("selectBox");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
if (selectedValue=="Office"){
$('#textboxes2').show();
$('#textboxes3').hide();

}
if (selectedValue=="Project"){
$('#textboxes3').show();
$('#textboxes2').show();

}

}
</script>
@endsection



@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <style>
        .gambar {
            width: 100%;
            height: 175px;
            padding: 0.9rem 0.9rem
        }

        @media only screen and (max-width: 600px) {
            .gambar {
                width: 100%;
                height: 100%;
                padding: 0.9rem 0.9rem
            }
        }

        html {
            overflow: scroll;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 0px;
            /* Remove scrollbar space */
            background: transparent;
            /* Optional: just make scrollbar invisible */
        }

        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }

        .cart-btn {
            position: absolute;
            display: block;
            top: 5%;
            right: 5%;
            cursor: pointer;
            transition: all 0.3s linear;
            padding: 0.6rem 0.8rem !important;

        }

        .productCard {
            cursor: pointer;

        }

        .productCard:hover {
            border: solid 1px rgb(172, 172, 172);

        }

    </style>
    @endpush

@push('js')

{{-- Styles Section --}}
   @section('styles')
       <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
   @endsection
   
   @if(Session::has('error'))
    <script>
        toastr.error(
            'Telah mencapai jumlah maximum Product | Silahkan tambah stock Product terlebih dahulu untuk menambahkan'
        )

    </script>
    @endif
   {{-- Scripts Section --}}
   @section('scripts')
       {{-- vendors --}}
       <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
   
       {{-- page scripts --}}
       <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
       <!-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> -->
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
 <script> 

var table = $('.example1').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route ('api.pending_stockout') }}",
    columns: [
            {data: 'user_id', name: 'user_id'},         
            {data: 'action', name: 'action', orderable: false, searchable: false}

        ],
    
});

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