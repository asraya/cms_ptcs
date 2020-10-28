{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>My Inventory List</h3>
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
                                    <input type="text" class="form-control" placeholder="Search..." id="test_search_query"/>
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="test_search_status">
                                        <option value="">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Delivered</option>
                                        <option value="3">Canceled</option>
                                        <option value="4">Success</option>
                                        <option value="5">Info</option>
                                        <option value="6">Danger</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="test_search_type">
                                        <option value="">All</option>
                                        <option value="1">Online</option>
                                        <option value="2">Retail</option>
                                        <option value="3">Direct</option>
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
                                        <th>ID</th>
                                        <th>Date</th>                      
                                        <th>Status</th>                            
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
               
               </table>
   
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
       <!-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> -->
       <script> 
    var table = $('.test').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ route ('api.pending_stockout') }}",
               columns: [  
               {data: 'user_id', name: 'historystocks.user_id'},
               {data: 'created_at', name: 'historystockscreated_at'},
            //    {data: 'stockout_status', name: 'stockout_status'},
               {data:  'stockout_status',name: 'stockout_status', render: function ( data, type, row ) {
                var text = "";
                var label = "";
                if (data == 'approved'){
                text = "Approved";
                label = "success";
                } else 
                if (data == 'pending'){
                text = "Pending";
                label = "warning";
                }
                return "<span class='badge badge-" + label + "'>"+ text + "</span>";
                }},
               {data: 'action', name: 'action', orderable: false, searchable: false},
   
            ],
    });
        $('body').on('click', '.deleteTodo', function () {
 
 var user_id = $(this).data("id");
 if(confirm("Are You sure want to delete !"))
 {
   $.ajax({
       type: "get",
       url: "{{ url('delete-user') }}"+'/'+user_id,
       success: function (data) {
       var oTable = $('#test').dataTable(); 
       oTable.fnDraw(false);
       },
       error: function (data) {
           console.log('Error:', data);
       }
   });
}
    });
</script>
@endsection

   
