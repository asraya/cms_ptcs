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
            <label class="col-form-label col-lg-3 col-sm-12">Employee ID</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="emp_id" class="form-control form-control-solid form-control-lg"  placeholder="Enter your Employee ID"/>
            </div>
        </div>

                    
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="name"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->name }}" readonly/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Jabatan</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="jabatan"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Jabatan"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Tujuan</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="tujuan"  class="form-control form-control-solid form-control-lg" value="PT Control Systems Arena Para Nusa"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Keperluan</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <textarea name="keperluan"  class="form-control form-control-solid form-control-lg">
               
            </textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-2 col-sm-7">From</label>
            <div class=" col-lg-4 col-md-5 col-sm-9">
               <input type="date" name="start"  class="form-control form-control-solid form-control-lg"/>
            </div>
        
            <label class="col-form-label col-lg-1 col-sm-7">To:</label>
            <div class=" col-lg-4 col-md-5 col-sm-9">
               <input type="date" name="end"  class="form-control form-control-solid form-control-lg"/>
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
