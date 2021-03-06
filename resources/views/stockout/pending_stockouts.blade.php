{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
            <!-- <h3 class="card-label">Corporate Management Systems

<div class="text-muted pt-2 font-size-sm">Datatable initialized from HTML table</div>
</h3> -->
<a href="/souvenir" class="btn btn-danger font-weight-bolder">
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
</span>List Souvenir</a>
&nbsp;
<a href="/stationary" class="btn btn-danger font-weight-bolder">
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
</span>List Stationary</a>
</div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Export
                    </button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->
                <a href="/add_genreq" class="btn btn-primary font-weight-bolder">
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
                </span>Create</a>
                
                <!--end::Button-->
            </div>
        
        </div>

        <div class="card-body">

            <!--begin::Search Form-->
            <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">

                                <input type="text" name="emp_id" class="form-control col-sm-12 filter-emp_id" placeholder="Filter Berdasarkan ID">
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>
                            
                          
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">

<select name="stockout_status" id="stockout_status" class="form-control">
   <option value=""> Pilih Periode </option>
   <option value="7"> 7 Hari Terakhir </option>
   <option value="14"> 14 Hari Terakhir </option>
   <option value="21"> 21 Hari Terakhir </option>
   <option value="31"> 31 Hari Terakhir </option>
   <option value="365"> 365 Hari Terakhir </option>
</select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    
                                    <select data-column="1" class="form-control col-sm-12 filter-satuan" placeholder="Filter Berdasarkan Satuan">
                                      <option value=""> Status </option>
                                      <option value="pending"> pending </option>
                                      <option value="WAITING PROCESS ADMIN"> WAITING PROCESS ADMIN </option>
                                    </select>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
                            Search
                        </a>
                    </div>
                    
                </div>
                
            </div>
            <!--end::Search Form-->
            <table class="table table-bordered table-hover test">

                                    <thead>
                                    <tr>
                                        <th>emp_id</th>
                                        <th>Request Form</th>    
                                        <th>Status</th>                            
                                        <th>Actions</th>
                                    </tr>
                                    </thead>               
               </table>   
           </div>   
           </div>
        <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" 
        role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
                <button type=button data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
            </div>
            <div class="modal-body">
                <form id="StockoutForm" name="StockoutForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group row">                    
                    <label class="col-xl-3 col-lg-3 col-form-label text-right">employee ID</label>
                    <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" id="emp_id" name="emp_id" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Status</label>
                    <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" id="stockout_status" name="stockout_status" readonly>
                        </div>
                    </div>
                   
                     <!-- <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes </button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
       </div>

       
   @endsection
   
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

       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

       <!-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> -->
       <script> 
           $(document).ready(function(){

    var table = $('.test').DataTable({
        
        pageLength: 10,
        searching: true,
           processing: true,
           serverSide: true,
           dom: '<"html5buttons">Blfrtip',
           language: {
                buttons: {
                    colvis : 'show / hide', // label button show / hide
                    colvisRestore: "Reset Kolom" //lael untuk reset kolom ke default
                }
        },
        
        buttons : [
                    {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    {extend:'csv'},
                    {extend: 'pdf', title:'Contoh File PDF Datatables'},
                    {extend: 'excel', title: 'Contoh File Excel Datatables'},
                    {extend:'print',title: 'Contoh Print Datatables'},
        ],

                    ajax: {
                        url :   "{{ route ('api.pending_stockout') }}",
                        "data" : function (d) {
                    d.stockout_status = $('#stockout_status').val();
            }
      
        },
        
        columns: [
                {data: 'emp_id', name: 'historystocks.emp_id'},
                {data: 'employee_name', employee_name: 'tbl_users.employee_name'},
                {data:  'stockout_status',name: 'historystocks.stockout_status', render: function ( data, type, row ) {
                var text = "";
                var label = "";
                if (data == 'approved'){
                text = "WAITING PROCESS ADMIN";
                label = "success";
                } else 
                if (data == 'WAITING PROCESS ADMIN'){
                text = "Done Process";
                label = "danger";                
                } else 
                if (data == 'pending'){
                text = "pending";
                label = "warning";
                } else
                if (data == 'Approved Manajer Div'){
                text = "Approved Manajer Div";
                label = "danger";

                }
                return "<span class='badge badge-" + label + "'>"+ text + "</span>";
                }},
               {data: 'action', name: 'action', orderable: false, searchable: false},
   
            ],         
          

        
    });
    $('#stockout_status').change(function () {
        table.draw();
    });
    $('.filter-satuan').change(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });
    $('.filter-emp_id').keyup(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });
    $('#createNewCustomer').click(function () {
        $('#saveBtn').val("create-Customer");
        $('#id').val('');
        $('#StockoutForm').trigger("reset");
        $('#modelHeading').html("Create New Customer");
        $('#exampleModalCenter').modal('show');
    });
    $('body').on('click', '.editStockout', function () {
      var id = $(this).data('id');
      $.get("" + 'general_request' +'/'+ id , function (data) {
          
          $('#modelHeading').html("Show");
          $('#saveBtn').val("edit-user");
          $('#exampleModalCenter').modal('show');
          $('#id').val(data.id);
          $('#emp_id').val(data.emp_id);
          $('#stockout_status').val(data.stockout_status);

      })
   });
   $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
          data: $('#StockoutForm').serialize(),
          url: "",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#StockoutForm').trigger("reset");
              $('#exampleModalCenter').modal('hide');
              table.draw();

          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

    $('body').on('click', '.deleteCustomer', function () {

        var id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: ""+'/'+id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


        $('body').on('click', '.deleteTodo', function () {
 
 var user_id = $(this).data("id");
 if(confirm("Are You sure want to delete !"))
 {
   $.ajax({
       type: "get",
       url: "{{ url('delete-user') }}"+'/'+user_id,
       success: function (data) {
       var oTable = $('#elearn').dataTable(); 
       oTable.fnDraw(false);
       },
       error: function (data) {
           console.log('Error:', data);
       }
   });
}
    });
});

</script>
@endsection
