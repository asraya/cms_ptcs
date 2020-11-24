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

<div class="card">
 <div class="card-body">

			<div class="row">
				<div class="col-xl-3"></div>
				<div class="col-xl-7">
                @if (count($errors) > 0)
    <div class="alert alert-danger">
     <button type="button" class="close" data-dismiss="alert">×</button>
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
   @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" action="{{url('add_spt/send')}}">

    {{ csrf_field() }}
   
    <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Employee ID</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
            <input type="hidden" name="spt_no" class="form-control form-control-solid form-control-lg" value="" />
            <input type="hidden" name="requester_id" class="form-control form-control-solid form-control-lg" value="" />
            <input type="hidden" name="status" class="form-control form-control-solid form-control-lg" value="3" readonly/>
            <input type="text" name="emp_id" class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->emp_id }}" readonly/>
            </div>
        </div>

                    
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Name</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="user_name"  class="form-control form-control-solid form-control-lg" value="{{ Auth::user()->user_name }}" readonly/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Jabatan</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="position"  class="form-control form-control-solid form-control-lg" placeholder="Enter your Jabatan"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Tujuan</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <input type="text" name="destination"  class="form-control form-control-solid form-control-lg" value="PT Control Systems Arena Para Nusa" readonly/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Keperluan</label>
            <div class=" col-lg-9 col-md-9 col-sm-12">
               <textarea name="purpose" class="form-control form-control-solid form-control-lg">
               
            </textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-2 col-sm-7">From</label>
            <div class=" col-lg-4 col-md-5 col-sm-9">
               <input type="date" name="spt_start"  class="form-control form-control-solid form-control-lg"/>
            </div>
        
            <label class="col-form-label col-lg-1 col-sm-7">To:</label>
            <div class=" col-lg-4 col-md-5 col-sm-9">
               <input type="date" name="spt_end"  class="form-control form-control-solid form-control-lg"/>
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
                <input type="submit" name="send" class="btn btn-info" value="Send" />
					<button type="reset" class="btn btn-clean font-weight-bold">Cancel</button>
				</div>
				<div class="col-xl-3"></div>
			</div>
		</div>
        </div>
		<!--end::Actions-->
	</form>

@endsection
