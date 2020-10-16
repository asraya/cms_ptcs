{{-- Header --}}
@if (config('layout.extras.quick-actions.dropdown.style') == 'light')
    <div class="d-flex flex-column flex-center py-10 bg-dark-o-5 rounded-top bg-light">
        <h4 class="text-dark font-weight-bold">
            Quick Actions
        </h4>
        <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">23 tasks pending</span>
    </div>
@else
    <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
        <h4 class="text-white font-weight-bold">
        {{ Auth::user()->user_name }}
            </h4>
        <!-- <a class="btn btn-light-primary font-weight-bolder btn-sm" href="{{ route('logout') }}">Logout</a> -->
    </div>
    <a class="nav-link font-weight-bolder" href="{!! route('sales.index') !!}">Point Of Sales Laravel                          

@endif

{{-- Nav --}}
<div class="row row-paddingless">
      

    {{-- Item --}}
    <div class="col-6">
    <a href="{{ route('profile') }}" class="d-block py-10 px-5 text-center bg-hover-light">
            {{ Metronic::getSVG("media/svg/icons/Communication/Group.svg", "svg-icon-3x svg-icon-success") }}
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Profile</span>
        </a>
    </div>
    

    {{-- Item --}}
    <div class="col-6">
        <a href="{{ route('logout') }}" class="d-block py-10 px-5 text-center bg-hover-light border-right">
            {{ Metronic::getSVG("media/svg/icons/Shopping/Box2.svg", "svg-icon-3x svg-icon-success") }}
            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Logout</span>
        </a>
    </div>
</div>
