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
				<div class="col-xl-6">
					<!--begin::Input-->
                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">User ID</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="id" class="form-control form-control-solid form-control-lg"  placeholder="Enter your User Id"/>
            </div>
        </div>

                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Employee ID</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="emp_id" class="form-control form-control-solid form-control-lg"  placeholder="Enter your Employee ID"/>
            </div>
        </div>

                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Division/Dept</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_division"  class="form-control form-control-solid form-control-lg" placeholder="Enter your User Division"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">First Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="first_name"  class="form-control form-control-solid form-control-lg" placeholder="Enter your First Name "/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Last Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="last_name"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Last Name"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">E-Mail Office</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Line Extension</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_phone"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Line Extention"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Phone Matrix</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_matrix"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Phone Matrtix"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">User Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_name"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Username"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Password</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="password"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Password"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Retype Password</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="password"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Retype Password"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">User Privilege</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">User Active</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
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
