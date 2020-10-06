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

    <form id="add-user" method="post" action="{{ url('update-user') }}"> 
      @csrf
      
      <input type="hidden" name="id" class="form-control" value="{{ $user->id }}" id="formGroupExampleInput">

      <div class="form-group">
        <label for="formGroupExampleInput">username</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name" value="{{ $user->name }}" readonly>
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div> 

      <div class="form-group">
        <label for="message">email</label>
        <textarea name="email" class="form-control" id="email" placeholder="Please enter email" readonly>{{ $user->email }}</textarea>
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>

      <div class="form-group">
       <button type="submit" class="btn btn-success" id="btn-send">Submit</button>
      </div>
    </form>



<!-- 

<div class="card">
 <div class="card-body">
			<div class="row">
				<div class="col-xl-3"></div>
    
            <label class="col-form-label col-lg-3 col-sm-12">ID</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
               <input type="text" name="id" class="form-control" id="id">
            </div>
        </div>
         <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Basic Example</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
                <select class="form-control kt-select2 select2" id="kt_select2_1" name="param">
                    <option value="AK">Alaska</option>
                    <option value="HI">Hawaii</option>
                    <option value="CA">California</option>
                    <option value="NV">Nevada</option>
                    <option value="OR">Oregon</option>
                    <option value="WA">Washington</option>
                    <option value="AZ">Arizona</option>
                    <option value="CO">Colorado</option>
                    <option value="ID">Idaho</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NM">New Mexico</option>
                    <option value="ND">North Dakota</option>
                    <option value="UT">Utah</option>
                    <option value="WY">Wyoming</option>
                    <option value="AL">Alabama</option>
                    <option value="AR">Arkansas</option>
                    <option value="IL">Illinois</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="OK">Oklahoma</option>
                    <option value="SD">South Dakota</option>
                    <option value="TX">Texas</option>
                    <option value="TN">Tennessee</option>
                    <option value="WI">Wisconsin</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="IN">Indiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="OH">Ohio</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WV">West Virginia</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Name</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
               <input type="text" name="name" class="form-control" id="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Email</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
               <input type="email" name="email" class="form-control" id="email">
            </div>
        </div>
    </div>
</div> -->


@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
