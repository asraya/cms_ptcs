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

        @if ($message = Session::get("success"))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif

        <table class="table table-hover table-sm" id="users-table">
            <thead>
            <tr>
                <th width = "50px"><b>id.</b></th>

                <th width = "180px"><b>Action</b></th>
               
            </tr>
            </thead>

           
        </table>

    </div>

@stop



{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>



{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
    <!-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> -->
    <script> 


    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        
        ajax: "{{ route ('api.pending_stockout') }}",
        
        columns: [
            {"data":"user_id"},
            // {"data":"umur"},
      
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ],
    });



    $('#users-table').on('click', '.btn-delete[data-remote]', function (e) { 
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
        }).always(function (data) {
            $('#users-table').DataTable().draw(false);
        });
    });

});
</script>
@endsection