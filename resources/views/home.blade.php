{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<!--Begin::Row-->
<div class="row">
    <div class="col-xl-4">
        <!--begin::Stats Widget 4-->
        <div class="card card-custom">
    <!--begin::Body-->
    <div class="card-body d-flex align-items-center py-0 mt-8">
        <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
            <a href="#" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">Account</a>
            <span class="font-weight-bold text-muted  font-size-lg">{{ Auth::user()->user_name }}</span>
        </div>
		<img alt="Logo" src="{{ asset('media/svg/avatars/029-boy-11.svg') }}"/>

    </div>
    <!--end::Body-->
    
 </div>
 

    </div>
    <!--begin::Content-->
	<div class="flex-row-fluid ml-lg-8">
		<!--begin::Card-->
		<div class="card card-custom card-stretch">
			<!--begin::Header-->
			<div class="card-header py-3">
				<div class="card-title align-items-start flex-column">
					<h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                </div>
				
			</div>
			<!--end::Header-->

			<!--begin::Form-->
			<form class="form">
				<!--begin::Body-->
				<div class="card-body">
					
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Employee ID</label>
						<div class="col-lg-9 col-xl-6">
							<input class="form-control form-control-lg form-control-solid" type="text" value="{{ Auth::user()->emp_id }}" readonly/>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Company Name</label>
						<div class="col-lg-9 col-xl-6">
							<input class="form-control form-control-lg form-control-solid" type="text" value="PT.Control Systems Arena Para Nusa" readonly/>
						</div>
					</div>
					<div class="row">
						<label class="col-xl-3"></label>
						<div class="col-lg-9 col-xl-6">
							<h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Contact Phone</label>
						<div class="col-lg-9 col-xl-6">
							<div class="input-group input-group-lg input-group-solid">
								<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
								<input type="text" class="form-control form-control-lg form-control-solid" value="" placeholder="Phone" readonly/>
							</div>
							<span class="form-text text-muted">We'll never share your email with anyone else.</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
						<div class="col-lg-9 col-xl-6">
							<div class="input-group input-group-lg input-group-solid">
								<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
								<input type="text" class="form-control form-control-lg form-control-solid" value="{{ Auth::user()->email }}" readonly/>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label text-right">Company Site</label>
						<div class="col-lg-9 col-xl-6">
							<div class="input-group input-group-lg input-group-solid">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Username" value="Currently placed at Kantor Pusat"/>
							</div>
						</div>
					</div>
				</div>
				<!--end::Body-->
			</form>
			<!--end::Form-->
		</div>
	</div>
	<!--end::Content-->
    </div>
    
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
