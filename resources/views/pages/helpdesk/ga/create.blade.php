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
				<div class="col-xl-7"></div>
				<div class="col-xl-12">
					<!--begin::Input-->
                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Ticket</label>
            <div class=" col-lg-5 col-md-5 col-sm-7">
               <input type="text" name="emp_id" class="form-control form-control-solid form-control-lg"  placeholder="Enter your Employee ID"/>
            </div>
        </div>

                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Employee ID</label>
            <div class=" col-lg-5 col-md-5 col-sm-7">
               <input type="text" name="emp_id" class="form-control form-control-solid form-control-lg"  value="{{ Auth::user()->emp_id }}" readonly/>
            </div>
        </div>
                    
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Name</label>
            <div class=" col-lg-5 col-md-5 col-sm-7">
               <input type="text" name="name"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->user_name }}" readonly/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Jabatan</label>
            <div class=" col-lg-5 col-md-5 col-sm-7">
               <input type="text" name="jabatan"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->user_division }}"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Email</label>
            <div class=" col-lg-5 col-md-5 col-sm-7">
               <input type="text" name="email"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->email }}" readonly/>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-form-label col-lg-3 col-sm-12">Attactment</label>
        <div class=" col-lg-5 col-md-5 col-sm-7">
                        <input type="file" name="file"  class="form-control" />
					</div>
                    </div>

        <div class="form-group row">
        <label for="" class="col-form-label col-lg-3 col-sm-12">Problem Type</label>
        <div class=" col-lg-5 col-md-5 col-sm-7">
        <select class="form-control">
        <option style="padding-left: 0.4em; padding-right: 3px;" value=>-- Choise Problem --</option>
                    <option disabled></option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='1'>CAR, PARKING, AND FIXTURES</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='2'>ELECTRICITY</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='3'>ELECTRONICS</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='4'>FURNITURE AND FIXTURES</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='5'>AIR CONDITIONER</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='6'>WORKSPACE FIT OUT</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='7'>SAFETY</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='8'>SANITATION</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='9'>TELEPHONE LINE AND GSM</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='10'>TOOLKITS AND MACHINERY</option>
                    <option style="padding-left: 0.4em; padding-right: 3px;" value='11'>OTHER</option>
        </select>
        </div>
        </div>
        <div class="form-group">
            <textarea id="konten" class="form-control" name="konten" rows="300" cols="300"></textarea>
                </textarea>
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
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
@endsection
