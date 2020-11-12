{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    <form id="add-user" method="post" action="{{ url('post-user') }}"> 
<div class="card">
 <div class="card-body">

			<div class="row">
				<div class="col-xl-3"></div>
				<div class="col-xl-7">
					<!--begin::Input-->
                    
                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">ID Stationary</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="emp_id" class="form-control form-control-solid form-control-lg" placeholder="Enter your Employee ID"/>
            </div>
        </div>

                    
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Name Stationary</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="name"  class="form-control form-control-solid form-control-lg" value="" placeholder="Enter your Name Stationary"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Stock</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="jabatan"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Stock"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Limit Request</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="tujuan"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Limit"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Unit</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="jabatan"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Unit"/>
            </div>
            </div>

            <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Price Stationary</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="jabatan"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Price"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Status</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
                <input type="radio" class="form-radio" name="stsstat" id="0"> <label for="rd1">Available</label>&nbsp;&nbsp;&nbsp;
                <input type="radio" class="form-radio" name="stsstat" id="1"> <label for="rd2">Not Available</label>
            </div>
        </div>


					<!--end::Input-->

					<!--begin::Input-->
                  
		<!--end::Input-->                    
				</div>
				<div class="col-xl-3"></div>
			</div>
		</div>
		<!--begin::Actions-->
		<div class="card-footer">
			<div class="row">
				<div class="col-xl-3"></div>
				<div class="col-xl-6">
					<button type="reset" class="btn btn-primary font-weight-bold mr-2">Submit</button>
					<button type="reset" class="btn btn-clean font-weight-bold">Cancel</button>
				</div>
				<div class="col-xl-3"></div>
			</div>
		</div>
        </div>
		<!--end::Actions-->
	</form>

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.add_spt').add_spt();
        });
    </script>
@endsection
