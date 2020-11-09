{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<!--Begin::Row-->
<div class="row">
    <div class="col-xl-4">
        <!--begin::Stats Widget 4-->
 <div class="card card-custom card-stretch gutter-b">
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
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
