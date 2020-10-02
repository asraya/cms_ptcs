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
               <input type="text" name="user_id" class="form-control form-control-solid form-control-lg"  placeholder="Enter your ID">
            </div>
        </div>

                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Employee ID</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="user_name" class="form-control form-control-solid form-control-lg"  placeholder="Enter your name"/>
            </div>
        </div>

                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Division/Dept</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">First Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Last Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
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
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">User Email</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Phone Matrix</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">User Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Password</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Retype Password</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="user_email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">User Privilege</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">

<select id="cars">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select>            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">User Active</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
       </div>
        </div>
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
            $('.add_user').add_user();
        });
    </script>
@endsection
