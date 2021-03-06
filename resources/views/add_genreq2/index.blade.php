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
                            <form action="{{ route('invoice.createsouvenir') }}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h3 class="card-title">
                                    CREATE GENERAL
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
 <label class="col-form-label col-lg-3 col-sm-10">Note</label>
<div class="col-lg-9 col-md-9 col-sm-12">
<textarea id="note" class="form-control" name="note">
</textarea>
</div>    
    </div> -->
    <!-- <div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-10">Purpose</label>
    <select class="col-lg-9 col-md-9 col-sm-12" id="selectBox" onchange="changeFunc();">
<option value="PurposeType">Purpose Type:</option>
<option value="Training">Training</option>
<option value="Project">Project</option>
</select>
    </div>  -->
        </div>
        </div>
<div class="form-group row">
<div class="col-lg-9 col-md-9 col-sm-12">
<input class="form-control form-control-lg" name="dd_number5" type="file" style="display: none" id="textboxes5">
</div>
</div>

<div class="form-group row">
<div class="col-lg-9 col-md-9 col-sm-12">
<input class="form-control form-control-lg" name="dd_number1" placeholder="Company Name" type="text" style="display: none" id="textboxes1">
<input class="form-control form-control-lg" name="dd_number3" placeholder="Project Name" type="text" style="display: none" id="textboxes3">

</div>
</div>
<div class="form-group row">
<div class="col-lg-9 col-md-9 col-sm-12">
<input class="form-control form-control-lg" name="dd_number2" placeholder="Tranning Subject	" type="text" style="display: none" id="textboxes2">
<input class="form-control form-control-lg" name="dd_number4" placeholder="SO Number" type="text" style="display: none" id="textboxes4">

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
                            Add Lists Souvenir
                                @if($cart_products_souvenir->count() < 1)
                                    <div class="alert alert-danger">
                                        No Product Added
                                    </div>
                                @else

                                    <table id="example4" class="table table-bordered table-striped text-center mb-3">
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
                                        @foreach($cart_products_souvenir as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-left">{{ $product->name }}</td>
                                                <form action="{{ route('cartsouvenir.update', $product->rowId) }}" method="post">
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
                                                    <form id="delete-form-{{ $product->id }}" action="{{ route('cartsouvenir.destroy', $product->rowId) }}" method="post"
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
                      <!-- <select name="name_merc">
    @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name_merc}}</option>
    @endforeach 
</select> -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Souvenir</h3> 
                                <a href="/add_genreq" class="btn btn-danger font-weight-bolder">
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
                </span>Request Stationary</a>
            </div>                               
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped text-center">
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
                                  
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <form action="{{ route('cartsouvenir.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id_item }}">
                                                <input type="hidden" name="name" value="{{ $product->name_merc }}">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="price" value="{{ $product->price_merc }}">

                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name_merc }}</td>                                                
                                                <td>{{ $product->price_merc, 2 }}</td>
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
  

<script type="text/javascript">
function changeFunc() {
var selectBox = document.getElementById("selectBox");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
if (selectedValue=="Training"){
$('#textboxes1').show();
$('#textboxes2').show();
$('#textboxes3').hide();
$('#textboxes4').hide();
$('#textboxes5').show();

}
if (selectedValue=="Project"){
$('#textboxes5').hide();
$('#textboxes4').show();
$('#textboxes3').show();
$('#textboxes2').hide();
$('#textboxes1').hide();

}

}
</script>
@endsection




@push('js')

{{-- Styles Section --}}
   @section('styles')
       <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
   @endsection

   
   {{-- Scripts Section --}}
   @section('scripts')
       {{-- vendors --}}
       <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
   
       {{-- page scripts --}}
       <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
       <!-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> -->
    <script>
    
        $(function () {
            $("#example3").DataTable();
            $('#example4').DataTable({
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

var table = $('.example3').DataTable({
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