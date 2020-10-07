{{-- Footer --}}

<div class="footer bg-white py-4 d-flex flex-lg-column {{ Metronic::printClasses('footer', false) }}" id="kt_footer">
    {{-- Container --}}
    <div class="{{ Metronic::printClasses('footer-container', false) }} d-flex flex-column flex-md-row align-items-center justify-content-between">
        {{-- Copyright --}}
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">{{ date("Y") }} &copy;</span>
            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">PT Control Systems Arena Para Nusa</a>
        </div>

        {{-- Nav --}}
       
        <div class="nav nav-dark order-1 order-md-2">
            <a href="#" target="_blank" class="socicon-instagram mr-5"></a>
            <a href="#" target="_blank" class="socicon-facebook mr-5"></a>
            <a href="http://www.ptcs.co.id" target="_blank" class="socicon-google mr-5"></a>

        </div>
    </div>
</div>
