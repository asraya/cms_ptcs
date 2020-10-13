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
            <label class="col-form-label col-lg-3 col-sm-12">Ticket</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="emp_id" class="form-control form-control-solid form-control-lg"  placeholder="Enter your Ticket"/>
            </div>
        </div>
                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Employee ID</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
            <input type="text" name="emp_id"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->emp_id}}" readonly/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Division</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
            <input type="text" name="user_division"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->user_division}}" readonly/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="name"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->user_name}}" readonly/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Email</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="tujuan"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->email}}" readonly/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Note</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <textarea name="keperluan"  class="form-control form-control-solid form-control-lg">
               
            </textarea>
            </div>
        </div>
        <label for="stationary">List stationary</label>
        <select class="form-control" name="stationary" id="stationary" data-parsley-required="true">
          @foreach ($stationary as $st) 
          {
            <option value="{{ $st }}">{{ $st }}</option>
          }
          @endforeach
        </select>
        
        
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
