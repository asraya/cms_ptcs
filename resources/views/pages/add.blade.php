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
            <label class="col-form-label col-lg-3 col-sm-12">ID</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="id" class="form-control form-control-solid form-control-lg"  placeholder="Enter your ID employee"/>
            </div>
        </div>

                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="name" class="form-control form-control-solid form-control-lg"  placeholder="Enter your name"/>
            </div>
        </div>
					<!--end::Input-->

					<!--begin::Input-->
                    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Email</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="email" name="email"  class="form-control form-control-solid form-control-lg" placeholder="Enter your email"/>
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
            $('.add').add();
        });
    </script>
@endsection
